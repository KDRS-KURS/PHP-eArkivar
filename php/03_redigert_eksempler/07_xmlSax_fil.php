<?php

	// Kode for XML SAX skrive til fil (XMLWriter)
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil

	// Generelle parametre
	$thisXmlMetode = 'XML SAX XMLWriter';
	$filnavn = $xmlSaxFilnavnUtTest;
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	// PHP start
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	
	// Ny instans SAX XMLWriter
	$sax = new XMLWriter();
	$sax->openURI($filnavn); 
	$sax->startDocument('1.0', 'UTF-8');
	$sax->setIndent(true);
	
	// XML root-element <uttrekk> med atributter
	$sax->startElement('uttrekk');
		$sax->writeAttribute('xml_write_metode', $thisXmlMetode);
		$sax->writeAttribute('xml_timestamp', $strStartDateTime);
		$sax->writeAttribute('php_script', $thisPhpScript);
		
		// XML element <arkiv>
		$sax->startElement('arkiv');	
			$sax->writeElement('systemID', '1');
			$sax->writeElement('beskrivelse', 'En beskrivelse');
		$sax->endElement();	// arkiv
		
		// XML element <arkiv>
		$sax->startElement('arkiv');	
			$sax->writeElement('systemID', '2');
			$sax->writeElement('beskrivelse', 'Andre beskrivelse');
		$sax->endElement();	// arkiv
		
	$sax->endElement();	// uttrekk
	$sax->endDocument();
	
	$sax->flush();
	
	// PHP slutt
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	
	print $thisXmlMetode . ' lagre fil [' . $filnavn . ']' . PHP_EOL;
	print 'PHP slutt [' . $strEndDateTime . ']' . PHP_EOL;
	
?>
