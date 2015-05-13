<?php

	### 91_end.inc.php ###
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bDebugInc) {
		print PHP_EOL;
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	print '... end.inc.php dummy line ...' . PHP_EOL;
	
	// END inc-section
	if ($bDebugInc) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
	// PHP slutt
	print PHP_EOL;
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	print 'PHP slutt [' . $strEndDateTime . ']' . PHP_EOL;
	
?>
