<?php

	// Kode for SQL-spørring mot database og XML SAX skrive til fil (XMLWriter)
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Koble til databasen;
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);
	
	// Generelle parametre
	$thisXmlMetode = 'XML SAX XMLWriter';
	$filnavn = $xmlSaxFilnavnUtSql_temp;
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	// PHP start
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	
	print PHP_EOL;
	print 'Prøver å opprette kobling til ' . PHP_EOL;
	print 'maskin (' . $IPAdresse . '), ' . PHP_EOL;
	print 'database (' . $databasenavn . '), ' . PHP_EOL;
	print 'brukernavn (' . $brukernavn . '), ' . PHP_EOL;
	print 'passord (' . $passord . ')' . PHP_EOL;

	if ($db->connect_errno > 0){
		die('Kunne ikke koble til database (' . $db->connect_error . ')' . PHP_EOL);
	}
	else {
		print 'Koblet til database' . PHP_EOL;
	}
	print PHP_EOL;

	// Nivå 1 Arkiv
	// SQL-spørring: Les alle rader fra tabell i variabel $tabellArkiv
	$sqlArkiv = 'SELECT * FROM ' . $tabellArkiv;
	$resultArkiv = $db->query($sqlArkiv);
	
	if(!$resultArkiv){
		die('Det oppsto et problem med spørringen Arkiv (' . $sql . ').' . 
			 PHP_EOL . 'Feilen er (' . $db->error . ')');
	}

	// Finn antall rader Arkiv fra kjørt spørring
	$numberArkivRows = $resultArkiv->num_rows;
	print 'Antall rader Arkiv som vi kan forvente er (' . 
			$numberArkivRows . ')' . PHP_EOL;
	print PHP_EOL;
	
	// Skriv XML til fil hvis arkiv-rader finnes
	if ($numberArkivRows > 0) {	
		// Ny instans SAX XMLWriter
		$addmlSAX = new XMLWriter();
		$addmlSAX->OpenURI($filnavn);
		//$addmlSAX->OpenURI('php://output');
		$addmlSAX->startDocument('1.0','UTF-8');
		$addmlSAX->setIndent(true);

		// XML root-element <uttrekk> med atributter
		$addmlSAX->startElement('uttrekk');
		$addmlSAX->writeAttribute('xml_write_metode', $thisXmlMetode);
		$addmlSAX->writeAttribute('xml_timestamp', $strStartDateTime);
		$addmlSAX->writeAttribute('php_script', $thisPhpScript);

		while($rowArkiv = $resultArkiv->fetch_assoc()){
			// XML element <arkiv>
			$addmlSAX->startElement('arkiv');
			foreach ($rowArkiv as $rowKey => $rowValue) {
				$addmlSAX->writeElement($rowKey, $rowValue);
			}			
			$addmlSAX->endElement();	// </arkiv>
		}
		
		$addmlSAX->endElement();	// </uttrekk>
		$addmlSAX->endDocument();
		$addmlSAX->flush();
		
		print $thisXmlMetode . ' lagre fil [' . $filnavn . ']' . PHP_EOL;
		
	} else {
		print 'IKKE lagret ' . $thisXmlMetode . ' til fil fordi ingen arkiv-rader funnet i database-tabell' . PHP_EOL;
	}
	
	// PHP slutt
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	print 'PHP slutt [' . $strEndDateTime . ']' . PHP_EOL;
		
?>
