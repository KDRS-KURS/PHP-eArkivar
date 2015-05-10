<?php

	### functions.inc.php ###
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bolDebugInc) {
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	print '... parse.inc.php dummy line ...' . PHP_EOL;
	
	// END inc-section
	if ($bolDebugInc) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
