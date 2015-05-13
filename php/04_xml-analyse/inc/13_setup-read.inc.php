<?php

	### 13_setup-read.inc.php ###
	
	# Sections in this inc-file: #
	# 13.1 - PHP command line parameters (arg value read loop) #
	# 13.2 - INI setup-file #
	# 13.3 - XML setup-file #
	
	## Global variables created in this include-section: ##
	
	// Read from PHP console parameters
	// $arrPhpParameter[<parameter key>] = <parameter value>
	$arrPhpParameter = array();
	
	// Read from INI setup-file
	$nIniSection = 0;
	$nIniSectionKey = 0;
	// $arrIniSection[<[section]>] = <0..n>  | Section order from top to bottom
	$arrIniSection = array();
	// $arrIniSectionKey[<[section]>][<key>] = <0..n>  | Key order from top to bottom
	$arrIniSectionKey = array();
	// $arrIniParameter[<key>] = <value>
	$arrIniParameter = array();
	
	## END global variables ##
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bDebugInc) {
		print PHP_EOL;
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	##### 13.1 - PHP command line parameters (arg value read loop) #####
	
	// Read from PHP console parameters
	// $arrPhpParameter[<parameter key>] = <parameter value>
	
	// Strips trailing "-", key-value separator is "?="
	// exits if duplicate parameter keys
	
	// PHP parameter count
	$nTemp = count($argv) - 1;
	print '- parameter count = [' . $nTemp . ']' . PHP_EOL;
	unset($nTemp);
	
	$arrTemp = array();
	$i=1;
	while ($i < count($argv)) {
		// Get PHP parameter key and value
		$arrTemp = explode('=', $argv[$i]);
		
		// Strip '-' from start of parameter if exists
		if ('-' == substr($arrTemp[0], 0, 1)) {
			$arrTemp[0] = substr($arrTemp[0], 1, strlen($arrTemp[0])-1);
		}
		$strKey = $arrTemp[0];
		
		// Exit if duplicate parameter
		if ( isset($arrPhpParameter[$arrTemp[0]]) ) {
			print PHP_EOL;
			print '## parameter error, duplicate : [' . $arrTemp[0] . '] ##' . PHP_EOL;
			print 'Run with help parameter: "php ' . $strPhpScript . ' help"' . PHP_EOL;
			print '> PHP EXIT <' . PHP_EOL;
			exit;
		}
		
		if (1 == count($arrTemp)) {
			// Parameter key without value
			$arrPhpParameter[$arrTemp[0]] = '';
			print '-- parameter without value "' . $arrTemp[0] . '"' . PHP_EOL;
		} elseif (2 !== count($arrTemp)) {
			// Error: More than one "=" in parameter element
			print PHP_EOL;
			print '- Parameter error, must include one single "=" : [' . $argv[$i] . ']' . PHP_EOL;
			print 'Run with help parameter: "php ' . $strPhpScript . ' help"' . PHP_EOL;
			print '> PHP EXIT <' . PHP_EOL;
			exit;
		} else {
			$arrPhpParameter[$arrTemp[0]] = $arrTemp[1];
			
			// Debug PHP parameter key & value
			if ($bDebugPhpParameter) {
				if ('' == $arrTemp[1]) {
					// Parameter key with empty value
					print '-- parameter with empty value "' . $arrTemp[0] . '="' . PHP_EOL;
				} else {
					// Parameter key with matching value
					print '-- parameter & value: "' . $arrTemp[0] . '=' . $arrTemp[1] . '"' . PHP_EOL;
				}
			}
		}
		$i++;
	}
	unset($arrTemp);
	unset($i);
	##### END 13.1 - PHP command line parameters (arg value read loop) #####
	
	##### 13.2 - INI setup-file #####
	
	if (!$fSetup = fopen($filenameIniSetup, 'r')) {
		// Error: failed to open file
		print PHP_EOL;
		print '## error opening setup filename [' . $filenameIniSetup . '] ##' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- open setup filename "' . $filenameIniSetup . '"' . PHP_EOL;
	}
	
	$arrTemp = array();
	$strSection = '';
	while ( !feof($fSetup) ) {
		$strLine = trim(fgets($fSetup));
		if (false === $strLine) {
			print '-- done reading INI setup-file (readline === false)' . PHP_EOL;
		}
		
		// Skip all lines starting with ";"
		$strTemp = substr($strLine, 0, 1);
		if ( !('' == $strLine OR ';' == $strTemp) ) {
			if ('[' == substr($strLine, 0, 1)) {
				// INI-file [section]
				$strSection = $strLine;
				
				// Strip preceding "["
				$strTemp = substr($strLine, 1, strlen($strLine)-1);
				
				// Strip trailing "]"
				if (']' == substr($strTemp, strlen($strTemp)-1, 1)) {
					$strTemp = substr($strTemp, 0, strlen($strTemp)-1);
					
					// Check for error; additional "[" or "]"
					if (strpos($strTemp, '[') ) {
						// Error: > 1 "[" in INI-file [section]
						print PHP_EOL;
						print '## error: > 1 "[" in INI-file [section] "' . $strLine . '" ##' .  PHP_EOL;
						print '> PHP EXIT <' . PHP_EOL;
						exit;
					} elseif (strpos($strTemp, ']') ) {
						// Error: > 1 "]" in INI-file [section]
						print PHP_EOL;
						print '## error: > 1 "]" in INI-file [section] "' . $strLine . '" ##' .  PHP_EOL;
						print '> PHP EXIT <' . PHP_EOL;
						exit;
					}
				} else {
					// Error: no trailing "]" in INI-file [section]
					print PHP_EOL;
					print '## error: no trailing "]" in INI-file [section] "' . $strLine . '" ##' .  PHP_EOL;
					print '> PHP EXIT <' . PHP_EOL;
					exit;
				}
				
				// At this point: $strLine = "[section]", $strTemp = "section"
				$strSection = $strTemp;
				$strSection2 = '[' . $strSection . ']';
				
				if ( isset($arrIniSection[$strSection]) ) {
					// Error: duplicate INI-file [section]
					print PHP_EOL;
					print '## error: duplicate INI-file [section]: "' . $strLine . '" ##' .  PHP_EOL;
					print '> PHP EXIT <' . PHP_EOL;
					exit;		
				} else {
					$arrIniSection[$strSection] = $nIniSection;
					$nIniSection++;
					$nIniSectionKey = 0;
				}
			} else {
				// Check for INI-file <key> = <value> line
				$arrTemp = explode('=', $strLine);
				
				if (1 == count($arrTemp)) {
					// Error: "=" missing in INI-file <key> = <value> line
					print PHP_EOL;
					print '## error: "=" missing in INI-file <key> = <value> line:' . PHP_EOL;
					print '"' . $strLine . '" ##' .  PHP_EOL;
					print '> PHP EXIT <' . PHP_EOL;
					exit;
				} else {
					// <key> = <value> line with single "="
					$strKey = trim($arrTemp[0]);
					$strValue = trim($arrTemp[1]);
					
					if ('' == $strKey) {
						// Error: INI-file key cannot be empty
						print PHP_EOL;
						print '## error: INI-file key cannot be empty:' . PHP_EOL;
						print '"' . $strLine . '" ##' .  PHP_EOL;
						print '> PHP EXIT <' . PHP_EOL;
						exit;
					}
					
					// strip trailing comments
					$arrTemp = explode(';', $strValue);
					$strValue = trim($arrTemp[0]);
					
					if ( isset($arrIniSectionKey[$strSection][$strKey]) ) {
						// Error: duplicate INI-file [section][key]
						print PHP_EOL;
						print '## error: duplicate INI-file [section][key]: "' . PHP_EOL;
						print '"' . $strLine . '" ##' .  PHP_EOL;
						print '> PHP EXIT <' . PHP_EOL;
						exit;		
					} else {
						$arrIniSectionKey[$strSection][$strKey] = $nIniSectionKey;
						$nIniSectionKey++;
					}
					
					if ( isset($arrIniParameter[$strKey]) ) {
						// Error: duplicate INI-file parameter [key]
						print PHP_EOL;
						print '## error: duplicate INI-file parameter [key] in [section]: "' . $strSection2 . ']' . PHP_EOL;
						print '"' . $strLine . '" ##' .  PHP_EOL;
						print '> PHP EXIT <' . PHP_EOL;
						exit;		
					} else {
						$arrIniParameter[$strKey] = $strValue;
					}
				}	// END <key> = <value> line with single "="
			}	// END if INI-file [section] or <key> = <value>
		}	// if '' (empty) OR ';' (text info) INI-file line
	}	// while read INI setup-file
	
	// Debug: Show INI-fil array variables?
	if ($bDebugDeveloper1) {
		print 'INI-file [section] count = ' . $nIniSection . PHP_EOL;
		// ToDo: Write compact function with print_r functionality with only minimum output lines
		// function "print_array($arrInput)" as multi-line string
		print_r ($arrIniSection);		
		print_r ($arrIniSectionKey);		
		print_r ($arrIniParameter);
	}
	
	unset($strSection);
	unset($strSection2);
	unset($strTemp);
	unset($strLine);
	unset($arrTemp);
	fclose($fSetup);
	##### END 13.2 - INI setup-file #####
	
	##### 13.3 - XML setup-file #####
	
	$bXmlSetupError = false;
	if (!$xmlSetup = simplexml_load_file($filenameXmlSetup)) {
		// Feil: får ikke åpnet xml-fil
		print '## error opening setup filename [' . $filenameXmlSetup . '] ##' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- open setup filename "' . $filenameXmlSetup . '"' . PHP_EOL;
	}
	
	
	
	if ($bXmlSetupError) {
		print PHP_EOL;
		print '## XML setup-file errors detected ##' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	##### END 13.3 - XML setup-file #####
	
	// END inc-section
	if ($bDebugInc) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
