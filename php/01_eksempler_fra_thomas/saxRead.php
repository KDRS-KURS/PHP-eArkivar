<?php

	$xml = new XMLReader();
	$xml->open('arkivstruktur.xml', 'UTF-8');

	 while($xml->read() && $xml->name !== 'mappe')
		; // gjør ingenting
	 
	 while($xml->name === 'mappe' && $xml->nodeType == XMLReader::ELEMENT) {
		
		$mappe = new SimpleXMLElement($xml->readOuterXML());		
		$systemID = $mappe['systemID'];		 
		print "systemID er (" . $systemID . ")" . PHP_EOL;		
		$tittel = $mappe['tittel'];
		print "tittel er (" . $tittel . ")" . PHP_EOL;		
		$xml->next('mappe');
	}

?>
