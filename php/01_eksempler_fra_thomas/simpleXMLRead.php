<?php

	$xml = simplexml_load_file("arkivstruktur.xml");
	
	foreach($xml->arkiv->arkivdel->mappe as $mappe) {
		print "sytemID er (" . $mappe->systemID . ")" . PHP_EOL;
		print "tittel er (" . $mappe->tittel  . ")" . PHP_EOL;
	}

?>
