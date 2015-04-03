<?php

	// Kode for XML SAX skrive til fil (XMLWriter)

	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil

	print 'Start XML SAX (XMLWriter) lagre fil' . PHP_EOL;

	$sax = new XMLWriter();
	$sax->openURI($xmlSaxFilnavnUt); 
	$sax->startDocument('1.0', 'UTF-8');
	$sax->setIndent(true);
	
	$sax->startElement('uttrekk');
	
		$sax->startElement('arkiv');	
			$sax->writeElement('systemID', '1');
			$sax->writeElement('beskrivelse', 'En beskrivelse');
		$sax->endElement();
		
		$sax->startElement('arkiv');	
			$sax->writeElement('systemID', '2');
			$sax->writeElement('beskrivelse', 'Andre beskrivelse');
		$sax->endElement();
		
	$sax->endElement();
	$sax->endDocument();
	
	$sax->flush();
	
	print 'Slutt PHP: XML SAX (XMLWriter) ' . $xmlSaxFilnavnUt . PHP_EOL;
	
?>
