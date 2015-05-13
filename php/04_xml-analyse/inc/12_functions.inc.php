<?php

	### 12_functions.inc.php ###
	
	# Sections in this inc-file: #
	
	## Global variables created in this include-section: ##	
	## END global variables ##
	
	// General parameters
	
	// PHP script
	$strIncPhpScript = pathinfo(__file__)['basename'];
	
	// START inc-section
	if ($bDebugInc) {
		print PHP_EOL;
		print 'START php include >>> ' . $strIncPhpScript . ' >>>' . PHP_EOL;
	}
	
	print '... functions.inc.php dummy line ...' . PHP_EOL;
	
	// END inc-section
	if ($bDebugInc) {
		print 'END php include <<< ' . $strIncPhpScript . ' <<<' . PHP_EOL;
	}
	
?>
