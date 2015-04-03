<?php

	// Kode for XML DOM skrive til fil

	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil

	print 'Start XML DOM lagre fil' . PHP_EOL;

	$dom = new DOMDocument('1.0', 'UTF-8');
	
	// lager <uttrekk> ... </uttrekk>
	$uttrekkRoot = $dom->createElement('uttrekk');
	$dom->appendChild($uttrekkRoot);
	
	// Arkiv 1
	// lager <arkiv> ... </arkiv>
	$arkivElement = $dom->createElement('arkiv');
	$uttrekkRoot->appendChild($arkivElement);
	
	// lager <systemID> ... </systemID>
	$systemIDElement = $dom->createElement('systemID');
	$systemIDText = $dom->createTextNode('1');
	$systemIDElement->appendChild($systemIDText);
	$arkivElement->appendChild($systemIDElement);
	
	// lager <beskrivelse> ... </beskrivelse>
	$beskrivelseElement = $dom->createElement('beskrivelse');
	$beskrivelseText = $dom->createTextNode('En beskrivelse');
	$beskrivelseElement->appendChild($beskrivelseText);
	$arkivElement->appendChild($beskrivelseElement);
	
	// Arkiv 2
	// lager <arkiv> ... </arkiv>
	$arkivElement = $dom->createElement('arkiv');
	$uttrekkRoot->appendChild($arkivElement);
	
	// lager <systemID> ... </systemID>
	$systemIDElement = $dom->createElement('systemID');
	$systemIDText = $dom->createTextNode('2');
	$systemIDElement->appendChild($systemIDText);
	$arkivElement->appendChild($systemIDElement);
	
	// lager <beskrivelse> ... </beskrivelse>
	$beskrivelseElement = $dom->createElement('beskrivelse');
	$beskrivelseText = $dom->createTextNode('Andre beskrivelse');
	$beskrivelseElement->appendChild($beskrivelseText);
	$arkivElement->appendChild($beskrivelseElement);
	
	
	$dom->formatOutput = true;
	$dom->save($xmlDomFilnavnUt);
	
	print 'Slutt PHP: XML DOM ' . $xmlDomFilnavnUt . PHP_EOL;
	
?>
