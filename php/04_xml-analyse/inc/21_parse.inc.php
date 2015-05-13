<?php

	### 21_parse.inc.php ###
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bDebugInc) {
		print PHP_EOL;
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	print '... parse.inc.php dummy line ...' . PHP_EOL;
	
	// END inc-section
	if ($bDebugInc) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
