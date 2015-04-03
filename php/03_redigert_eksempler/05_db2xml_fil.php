<?php

	// Kode for SQL-spørring mot database og skrive XML til fil
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
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
		// Åpne xml-fil for skriving
		$filnavn = $xmlHcFilnavnUt;
		$arkivFil = fopen($filnavn, 'w');
		
		fwrite($arkivFil, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
		fwrite($arkivFil, '<uttrekk>' .  PHP_EOL);
		
		while($rowArkiv = $resultArkiv->fetch_assoc()){
			fwrite( $arkivFil, "\t" . '<arkiv>' .  PHP_EOL);
			fwrite( $arkivFil, "\t\t" . '<systemId>' . $rowArkiv['system_id'] . '</systemId>' . PHP_EOL);
			fwrite( $arkivFil, "\t\t" . '<tittel>' . $rowArkiv['title'] .'</tittel>' . PHP_EOL);
			fwrite( $arkivFil, "\t\t" . '<beskrivelse>' . $rowArkiv['description'] .'</beskrivelse>' . PHP_EOL);
			fwrite( $arkivFil, "\t\t" . '<created_date>' . $rowArkiv['created_date'] .'</created_date>' . PHP_EOL);
			fwrite( $arkivFil, "\t\t" . '<created_by>' . $rowArkiv['created_by'] .'</created_by>' . PHP_EOL);
			fwrite( $arkivFil, "\t" . '</arkiv>' .  PHP_EOL);
		}
		
		fwrite( $arkivFil, '</uttrekk>' .  PHP_EOL);
		print 'Lagret xml til fil ' . $filnavn . PHP_EOL;
		
	} else {
		print 'IKKE lagret xml til fil fordi ingen arkiv-rader funnet i database-tabell' . PHP_EOL;
	}
	
	$resultArkiv->free();	
	$db->close();

?>

