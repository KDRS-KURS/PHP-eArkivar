<?php

	### 14_setup-select.inc.php ###
	
	# global variables created in this include-section: #
	
	// Final setup-parameters after analysing PHP parameters, INI & XML setup-files
	// $arrRunParameter[<parameter key>] = <parameter value>
	$arrRunParameter = array();
	
	# END global variables #
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bDebugInc) {
		print PHP_EOL;
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	



	
	
	
	
	// END inc-section
	if ($bDebugInc) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
