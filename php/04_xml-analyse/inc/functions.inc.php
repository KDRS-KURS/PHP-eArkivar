<?php

	### functions.inc.php ###
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bolDebugInc) {
		print 'START php include >>> ' . $thisPhpScript . ' >>>' . PHP_EOL;
	}
	
	print '... functions.inc.php dummy line ...' . PHP_EOL;
	
	// END inc-section
	if ($bolDebugInc) {
		print 'END php include <<< ' . $thisPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
