<?php

	$dom = new DOMDocument();
	$dom->load('arkivstruktur.xml');
  
	$alleMapper = $dom->getElementsByTagName("mappe");
	
	foreach($alleMapper as $mappe) {
		$systemIDElement = $mappe->getElementsByTagName( "systemID" );
		$systemID = $systemIDElement->item(0)->nodeValue;
		print "systemID er (" . $systemID . ")" . PHP_EOL;

		$tittelElement = $mappe->getElementsByTagName( "tittel" );
		$tittel = $tittelElement->item(0)->nodeValue;		
		print "tittel er (" . $tittel  . ")" . PHP_EOL;
	}

?>
