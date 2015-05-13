<?php

	### 11_init.inc.php ###
	
	# Sections in this inc-file: #
	# 11.1 - PHP command line parameters (help) #
	# 11.2 - code version #
	
	## Global variables created in this include-section: ##
	
	// $argv is a "system" array with all PHP console parameters
	// "php <parameter 0> <parameter 1> <parameter 2 etc.>"
	// $argv[0] is the running php-file itself, ex. "main.php"
	
	## END global variables ##
	
	// General parameters
	// ToDO: debug parameter vs debug setup
	// Check for debugmode levels etc.
	$bDebugInc = true;			// =true, log debug info from inc-sections; =false, disabled
	$bDebugPhpParameter = true;		// =true, show parameters; =false, disabled
	$bDebugDeveloper1 = false;	// =true, extended debugging; =false, disabled
	
	// Setup files
	$filenameXmlCodeVersion = 'xml\code_version.xml';
	$filenameHelp = 'php-help.txt';
	$filenameIniSetup = 'setup.ini';
	$filenameXmlSetup = 'xml\setup.xml';
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	##### 11.1 - PHP command line parameters (help) #####
	
	if ($argv[0] !== $strPhpScript) {
		print PHP_EOL;
		print '## PHP error: [' . $argv[0] . '] !== [' . $strPhpScript . '] ##' . PHP_EOL;
		exit;
	}
	
	// Hardcoded parameters: [-h], [-help], [h] & [help]; Display help info and exit
	// The helpfile must exist as provided in variable $filenameHelp above
	if ( count($argv) > 1 ) {
		if ('-h' == $argv[1] OR '-help' == $argv[1]  OR 'h' == $argv[1] OR 'help' == $argv[1]) {
			// help-file
			if (!$fHelp = fopen($filenameHelp, 'r')) {
				// Error: failed to open file
				print PHP_EOL;
				print '## error opening help filename [' . $filenameHelp . '] ##' .  PHP_EOL;
				print '> PHP EXIT <' . PHP_EOL;
				exit;
			}
			
			print PHP_EOL;
			print '### help information # ' . $strPhpScript . ' ###' . PHP_EOL;
			print PHP_EOL;
			
			while ( !feof($fHelp) ) {
				$strLine = fgets($fHelp);
				print $strLine;
			}
			print PHP_EOL;
			fclose($fHelp);
			exit;
		}	// if first parameter = help
	}	// if count($argv) > 1
	
	##### END 11.1 - PHP command line parameters (arg value & help) #####
	
	// PHP start
	print PHP_EOL;
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	print 'PHP filnavn "' . $strPhpScript . '"' . PHP_EOL;
	
	// START inc-section
	if ($bDebugInc) {
		print PHP_EOL;
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	##### 11.2 - code version #####
	
	// code version: name, version, date
	// code version elements are "hardcoded" and must containt elements in code below
	
	if (!$xmlCodeVersion = simplexml_load_file($filenameXmlCodeVersion)) {
		// Error: failed to open file
		print PHP_EOL;
		print '## error opening code version filename [' . $filenameXmlCodeVersion . '] ##' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- open code version filename "' . $filenameXmlCodeVersion . '"' . PHP_EOL;
	}
	
	// name
	if ( isset($xmlCodeVersion->name) ) {
		print '-- code name "' . $xmlCodeVersion->name . '"' . PHP_EOL;
	} else {
		print PHP_EOL;
		print '## error code name ##' . PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	
	// version
	if ( isset($xmlCodeVersion->version) ) {
		print '-- code version "' . $xmlCodeVersion->version . '"' . PHP_EOL;
	} else {
		print PHP_EOL;
		print '## error code version ##' . PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	
	// date
	if ( isset($xmlCodeVersion->date) ) {
		print '-- Code date "' . $xmlCodeVersion->date . '"' . PHP_EOL;
	} else {
		print PHP_EOL;
		print '## Error code date ##' . PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	##### END 11.2 - code version #####
	
	// END inc-section
	if ($bDebugInc) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
