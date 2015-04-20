<?php

	### init.inc.php ###
	
	// Global variables created in this include-section:
	
	// Read from PHP console parameters
	// $arrPhpParameter[<parameter key>] = <parameter value>
	$arrPhpParameter = array();
	
	// General parameters
	$bolDebugInit = true;	// = true, print debug info from init-section
	
	// setup files
	$filenameXmlCodeVersion = 'xml\code_version.xml';
	$filenameIniSetup = 'xml-analyse.ini';
	$filenameXmlSetup = 'xml\setup.xml';
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	// PHP command line parameters (arg value)
	if ($argv[0] !== $mainPhpScript) {
		print 'PHP error: [' . $argv[0] . '] !== [' . $mainPhpScript . ']' . PHP_EOL;
		exit;
	}
	
	// Parameters [-h] or [-help]: Display help info and exit
	if ('-h' == $argv[1] OR '-help' == $argv[1] ) {
		print PHP_EOL;
		print 'Help option ' . $argv[1] . PHP_EOL;
		// Expand help-text into multiple lines for better help on  usage
		print 'Usage ex.: "PHP ' . $mainPhpScript . ' -dc:\uttrekk"' . PHP_EOL;
		exit;
	}
	
	// PHP start
	print PHP_EOL;
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	print 'PHP filnavn "' . $mainPhpScript . '"' . PHP_EOL;
	
	// code version: name, version, date
	if (!$xmlCodeVersion = simplexml_load_file($filenameXmlCodeVersion)) {
		// Feil: får ikke åpnet xml-fil
		print 'Error opening code version filename [' . $filenameXmlCodeVersion . ']' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- Open code version filename "' . $filenameXmlCodeVersion . '"' . PHP_EOL;
	}
	
	// name
	if ( isset($xmlCodeVersion->name) ) {
		print '-- Code name "' . $xmlCodeVersion->name . '"' . PHP_EOL;
	} else {
		print 'Error code name' . PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	
	// version
	if ( isset($xmlCodeVersion->version) ) {
		print '-- Code version "' . $xmlCodeVersion->version . '"' . PHP_EOL;
	} else {
		print 'Error code version' . PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	
	// date
	if ( isset($xmlCodeVersion->date) ) {
		print '-- Code date "' . $xmlCodeVersion->date . '"' . PHP_EOL;
	} else {
		print 'Error code date' . PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	}
	
	// START inc-section
	if ($bolDebugInit) {
		print 'START php include >>> ' . $thisPhpScript . ' >>>' . PHP_EOL;
	}
	
	// Other valid parameters
	// -dataset-dir=...   {ex "=c:\uttrekk" or "=uttrekk"}
	// -subdir=...   {=0 no subdirs (default), =1 one level etc.}
	// -log-dir=...   {ex "-log-dir=c:\uttrekk" or "-log-dir=uttrekk"}
	// -debug=...   {=0 no debugging (default), >0 debugmode enabled}
	
	// Debug
	$nTemp = count($argv) - 1;
	print '- Parameter count = [' . $nTemp . ']' . PHP_EOL;
	unset($nTemp);
	
	$arrTemp = array();
	$i=1;
	while ($i < count($argv)) {
		// get PHP parameter key and value
		$arrTemp = explode('=', $argv[$i]);
		// All parameters must include "="
		if (2 !== count($arrTemp)) {
			print '- Parameter error, without "=" : [' . $argv[$i] . ']' . PHP_EOL;
			print '> PHP EXIT <' . PHP_EOL;
			exit;
		}
		
		// strip '-' from start of parameter if exists
		if ('-' == substr($arrTemp[0], 0, 1)) {
			$arrTemp[0] = substr($arrTemp[0], 1, strlen($arrTemp[0])-1);
		}
		
		// Exit if duplicate parameter
		if ( isset($arrPhpParameter[$arrTemp[0]]) ) {
			print '- Parameter error, duplicate : [' . $arrTemp[0] . ']' . PHP_EOL;
			print '> PHP EXIT <' . PHP_EOL;
			exit;
		}
		
		$arrPhpParameter[$arrTemp[0]] = $arrTemp[1];		
		$i++;
	}
	unset($arrTemp);
	unset($i);
	
	// Other valid parameters
	foreach ($arrPhpParameter as $strKey => $strValue) {
		switch ($strKey) {
			// -dataset-dir=...   {ex "=c:\uttrekk" or "=uttrekk"}
			case 'dataset-dir':
				print '-- Parameter: dataset-dir = [' . $strValue . ']' . PHP_EOL; 
				break;
			// -subdir=...   {=0 no subdirs (default), =1 one level etc.}
			case 'subdir':
				print '-- Parameter: subdir = [' . $strValue . ']' . PHP_EOL; 
				break;
			// -log-dir=...   {ex "-log-dir=c:\uttrekk" or "-log-dir=uttrekk"}
			case 'log-dir':
				print '-- Parameter: log-dir = [' . $strValue . ']' . PHP_EOL; 
				break;
			// -debug=...   {=0 no debugging (default), >0 debugmode enabled}
			case 'debug':
				print '-- Parameter: debug = [' . $strValue . ']' . PHP_EOL; 
				break;
			default:
				print '- Parameter error, unknown : [' . $strKey . '=' . $strValue . ']' . PHP_EOL;
				print '> PHP EXIT <' . PHP_EOL;
				exit;
		}	// end switch		
	}	// end foreach
	
	// END inc-section
	if ($bolDebugInit) {
		print 'END php include <<< ' . $thisPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
