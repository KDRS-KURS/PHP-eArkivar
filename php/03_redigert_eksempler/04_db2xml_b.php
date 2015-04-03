<?php

	// Kode for SQL-spørring mot database og skrive XML til skjerm
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
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

	// Skriv XML til skjerm hvis arkiv-rader finnes
	if ($numberArkivRows > 0) {
		print '<arkiv>' .  PHP_EOL;
		
		while($rowArkiv = $resultArkiv->fetch_assoc()){
			print "\t" . '<arkiv>' .  PHP_EOL;
			foreach ($rowArkiv as $rowKey => $rowValue) {
				print "\t\t" . '<' . $rowKey . '>' . $rowValue . '</' . $rowKey . '>' . PHP_EOL;
			}
			print "\t" . '</arkiv>' .  PHP_EOL;
		}
		
		print '</arkiv>' . PHP_EOL;
	}
	
	$resultArkiv->free();	
	$db->close();

?>

