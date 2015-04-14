<?php

	// Kode for SQL-spørring mot database og skrive XML fra arkiv-tabell til fil
	// XML hardkodet skrivemetode (dvs. bruker ikke xml-bibliotek for å lage XML)
	// Oppslag mot parameterfil for tabellnavn, xml-header og automatisk 1 element pr. felt i arkivtabell
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Generelle parametre
	$thisPhpInfo = 'XML HC (hardkodet), db arkiv til xml (auto)';
	$filnavn = $xmlHcFilnavnUtTest;
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	// PHP start
	print PHP_EOL;
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	print 'PHP metode [' . $thisPhpInfo . ']' . PHP_EOL;
	
	// Koble til databasen;
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);

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
		print 'Start lagre fil' . PHP_EOL;
		
		// Åpne xml-fil for skriving
		$arkivFil = fopen($filnavn, 'w');
		
		fwrite($arkivFil, $xmlHeader . PHP_EOL);
		
		$tmpStr = '<uttrekk';
		$tmpStr .= ' xml_write_metode="' . $thisPhpInfo . '"';
		$tmpStr .= ' xml_timestamp="' . $strStartDateTime . '"';
		$tmpStr .= ' php_script="' . $thisPhpScript . '"';
		$tmpStr .= '>' .  PHP_EOL;
		fwrite($arkivFil, $tmpStr);

		while($rowArkiv = $resultArkiv->fetch_assoc()){
			fwrite( $arkivFil, "\t" . '<arkiv>' .  PHP_EOL);
			foreach ($rowArkiv as $rowKey => $rowValue) {
				fwrite( $arkivFil, "\t\t" . '<' . $rowKey . '>' . $rowValue . '</' . $rowKey . '>' . PHP_EOL);
			}			
			fwrite( $arkivFil, "\t" . '</arkiv>' .  PHP_EOL);
		}
		
		fwrite( $arkivFil, '</uttrekk>' .  PHP_EOL);
		print 'Lagre fil [' . $filnavn . ']' . PHP_EOL;
		
	} else {
		print 'IKKE lagret ' . $thisPhpInfo . ' til fil fordi ingen arkiv-rader funnet i database-tabell' . PHP_EOL;
	}
	
	$resultArkiv->free();	
	$db->close();
	
	// PHP slutt
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	
	print 'PHP slutt [' . $strEndDateTime . ']';

?>

