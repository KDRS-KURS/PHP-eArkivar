<?php
	
	$alleFrukt = array('Eple', 'Banan', 'Pære', 'Tomat');

	foreach ($alleFrukt as $frukt) {
		printFrukt($frukt);
	}
	
	function printFrukt($frukt) {
		print $frukt . " er et frukt" . PHP_EOL;
	}
?>
