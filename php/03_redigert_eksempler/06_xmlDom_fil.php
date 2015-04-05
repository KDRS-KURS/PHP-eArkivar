<?php

	// Kode for XML DOM skrive til fil

	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Generelle parametre
	$thisXmlMetode = 'XML DOM';
	$filnavn = $xmlDomFilnavnUtTest;
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	// PHP start
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	
	// Ny instans DOM XML-dokument
	$dom = new DOMDocument('1.0', 'UTF-8');
	
	// lager <uttrekk> ... </uttrekk>
	$uttrekkRoot = $dom->createElement('uttrekk');
	$dom->appendChild($uttrekkRoot);
	
	// legger til 3 atributter til hovedelement <uttrekk>
	$uttrekkRoot->setAttribute('xml_write_metode', $thisXmlMetode);
	$uttrekkRoot->setAttribute('xml_timestamp', $strStartDateTime);
	$uttrekkRoot->setAttribute('php_script', $thisPhpScript);
	
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
	$dom->save($filnavn);
	
	// PHP slutt
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	
	print $thisXmlMetode . ' lagre fil [' . $filnavn . ']' . PHP_EOL;
	print 'PHP slutt [' . $strEndDateTime . ']' . PHP_EOL;
	
?>
