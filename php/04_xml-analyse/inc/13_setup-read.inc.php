<?php

	### setup.inc.php ###
	
	// Global variables created in this include-section:
	
	// Read from INI setup-file
	// $arrIniParameter[<parameter key>] = <parameter value>
	$arrIniParameter = array();
	
	// Final setup-parameters after analysing PHP parameters, INI & XML setup-files
	// $arrRunParameter[<parameter key>] = <parameter value>
	$arrRunParameter = array();
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bolDebugInit) {
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	##### 1 - INI setup-file #####
	$bolIniSetupError = false;
	if (!$fSetup = fopen($filenameIniSetup, 'r')) {
		// Feil: får ikke åpnet ini-fil
		print 'Error opening setup filename [' . $filenameIniSetup . ']' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- Open setup filename "' . $filenameIniSetup . '"' . PHP_EOL;
	}
	
	$arrTemp = array();
	$strSection = '';
	while ( !feof($fSetup) ) {
		$strLine = fgets($fSetup);
		if (false === $strLine) {
			print '-- Done reading INI setup-file (readline === false)' . PHP_EOL;
		}
		
		// Skip all lines starting with "" or ";"
		$strTemp = substr($strLine[0], 0, 1);
		if ( !('' == $strTemp OR ';' == $strTemp) ) {
			if ('[' == substr($strLine[0], 0, 1)) {
				// [section]
				$strTemp = trim($strLine);
				switch ($strTemp) {
					case '[DATASET]':
						$strSection = $strTemp;
						if ( isset($arrIniParameter[$strSection]) ) {
							
						} else {
							$arrIniParameter[$strSection] = $strSection;
						}
						print '-- INI section: [DATASET]' . PHP_EOL;
						break;
					case '[SUBDIR]':
						$strSection = $strTemp;
						if ( isset($arrIniParameter[$strSection]) ) {
							
						} else {
							$arrIniParameter[$strSection] = $strSection;
						}
						print '-- INI section: [SUBDIR]' . PHP_EOL;
						break;
					case '[LOG]':
						$strSection = $strTemp;
						if ( isset($arrIniParameter[$strSection]) ) {
							
						} else {
							$arrIniParameter[$strSection] = $strSection;
						}
						print '-- INI section: [LOG]' . PHP_EOL;
						break;
					case '[DEBUG]':
						$strSection = $strTemp;
						if ( isset($arrIniParameter[$strSection]) ) {
							
						} else {
							$arrIniParameter[$strSection] = $strSection;
						}
						print '-- INI section: [DEBUG]' . PHP_EOL;
						break;
					default:
						$strSection = '[DUMMY]';
						print '- INI section error, unknown : ' . $strLine .  PHP_EOL;
						print '> PHP EXIT <' . PHP_EOL;
						exit;
				}	// end switch	
			} else {
				// Check for <INI key> = <INI value> line
				$arrTemp = explode('=', $strLine);
				
				// Ignore elements without "="
				if (count($arrTemp) > 1) {
					$strKey = trim($arrTemp[0]);
					$strValue = trim($arrTemp[1]);
					
					// strip trailing comments
					$arrTemp = explode(';', $strValue);
					$strValue = trim($arrTemp[0]);
					switch ($strKey) {
						// dataset-dir=...   {ex "=c:\uttrekk" or "=uttrekk"}
						case 'dataset-dir':
							if ('[DATASET]' !== $strSection) {
								print '--- INI section ' . $strSection . ', expected [DATASET] for : ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								$bolIniSetupError = true;
							} else {
								if ('' == $strValue) {
									print '--- INI parameter error, empty value for key [' . $strKey . ']' . PHP_EOL;
									$bolIniSetupError = true;
								} else {
									print '--- INI parameter: ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								}
							}
							break;
						case 'subdir':
							if ('[SUBDIR]' !== $strSection) {
								print '--- INI parameter not in section [SUBDIR] : ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								$bolIniSetupError = true;
							} else {
								if ('' == $strValue) {
									print '--- INI parameter error, empty value for key [' . $strKey . ']' . PHP_EOL;
									$bolIniSetupError = true;
								} else {
									print '--- INI parameter: ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								}
							}
							break;
						case 'log-dir':
							if ('[LOG]' !== $strSection) {
								print '--- INI parameter not in section [LOG] : ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								$bolIniSetupError = true;
							} else {
								if ('' == $strValue) {
									print '--- INI parameter error, empty value for key [' . $strKey . ']' . PHP_EOL;
									$bolIniSetupError = true;
								} else {
									print '--- INI parameter: ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								}
							}
							break;
						case 'debug':
							if ('[DEBUG]' !== $strSection) {
								print '--- INI parameter not in section [DEBUG] : ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								$bolIniSetupError = true;
							} else {
								if ('' == $strValue) {
									print '--- INI parameter error, empty value for key [' . $strKey . ']' . PHP_EOL;
									$bolIniSetupError = true;
								} else {
									print '--- INI parameter: ' . $strKey . ' = [' . $strValue . ']' . PHP_EOL;
								}
							}
							break;
						default:
							print '-- INI parameter error, unknown key[value] for key [' . $strKey . '] = value [' . $strValue . ']' . PHP_EOL;
					}	// end switch
				}	// if Ignore elements without "="
			}	// if else '['
		}	// if '' !==
	}	// while read INI setup-file
	unset($strSection);
	unset($strTemp);
	unset($strLine);
	unset($arrTemp);
	fclose($fSetup);
	
	if ($bolIniSetupError) {
		print '-- INI setup-file errors detected' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	
	##### 2 - XML setup-file #####
	$bolXmlSetupError = false;
	if (!$xmlSetup = simplexml_load_file($filenameXmlSetup)) {
		// Feil: får ikke åpnet xml-fil
		print 'Error opening setup filename [' . $filenameXmlSetup . ']' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- Open setup filename "' . $filenameXmlSetup . '"' . PHP_EOL;
	}
	
	
	
	if ($bolXmlSetupError) {
		print '-- XML setup-file errors detected' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	
	
	
	// ToDO: debug parameter vs debug setup
	// Check for debugmode levels etc.
	$bolDebugInc = true;
	
	
	
	// END inc-section
	if ($bolDebugInit) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
