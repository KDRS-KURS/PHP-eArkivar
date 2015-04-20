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
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bolDebugInit) {
		print 'START php include >>> ' . $thisPhpScript . ' >>>' . PHP_EOL;
	}
	
	// INI setup-file
	if (!$fSetup = fopen($filenameIniSetup, 'r')) {
		// Feil: får ikke åpnet ini-fil
		print 'Error opening setup filename [' . $filenameIniSetup . ']' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- Open setup filename "' . $filenameIniSetup . '"' . PHP_EOL;
	}
	
	// XML setup-file
	if (!$xmlSetup = simplexml_load_file($filenameXmlSetup)) {
		// Feil: får ikke åpnet xml-fil
		print 'Error opening setup filename [' . $filenameXmlSetup . ']' .  PHP_EOL;
		print '> PHP EXIT <' . PHP_EOL;
		exit;
	} else {
		print '- Open setup filename "' . $filenameXmlSetup . '"' . PHP_EOL;
	}

	
	
	// ToDO: debug parameter vs debug setup
	// Check for debugmode levels etc.
	$bolDebugInc = true;
	
	
	
	// END inc-section
	if ($bolDebugInit) {
		print 'END php include <<< ' . $thisPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
