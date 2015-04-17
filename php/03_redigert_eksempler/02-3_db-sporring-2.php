<?php

	// Kode for SQL-spørring mot database
	// Leser og viser: Arkiv, Arkivdel, Saksmappe
	
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
	$sql = 'SELECT * FROM ' . $tabellArkiv;
	$result = $db->query($sql);
	
	if(!$result){
		die('Det oppsto et problem med spørringen Arkiv (' . $sql . ').' . 
			 PHP_EOL . 'Feilen er (' . $db->error . ')');
	}
	
	// Finn antall rader fra kjørt spørring
	$numberRowsInResultSet = $result->num_rows;
	print 'Antall rader Arkiv som vi kan forvente er (' . 
			$numberRowsInResultSet . ')' . PHP_EOL;
	
	// Bla gjennom alle rader (resultat av spørring)
	while($row = $result->fetch_assoc()){		
		// Vise hele array av felter for denne rad (i tabellen for Arkiv)
		print_r($row);
	}
	print PHP_EOL;
	
	// Nivå 2 Arkivdel
	// SQL-spørring: Les alle rader fra tabell i variabel $tabellArkivdel
	$sql = 'SELECT * FROM ' . $tabellArkivdel;
	$result = $db->query($sql);
	
	if(!$result){
		die('Det oppsto et problem med spørringen Arkivdel (' . $sql . ').' . 
			 PHP_EOL . 'Feilen er (' . $db->error . ')');
	}
	
	// Finn antall rader fra kjørt spørring
	$numberRowsInResultSet = $result->num_rows;
	print 'Antall rader Arkivdel som vi kan forvente er (' . 
			$numberRowsInResultSet . ')' . PHP_EOL;
	
	// Bla gjennom alle rader (resultat av spørring)
	while($row = $result->fetch_assoc()){
		// Vise hele array av felter for denne rad (i tabellen for Arkivdel)
		print_r($row);
	}
	print PHP_EOL;
	
	// Nivå 3 Saksmappe
	// SQL-spørring: Les alle rader fra tabell i variabel $tabellSaksmappe
	$sql = 'SELECT * FROM ' . $tabellSaksmappe;
	$result = $db->query($sql);
	
	if(!$result){
		die('Det oppsto et problem med spørringen Saksmappe (' . $sql . ').' . 
			 PHP_EOL . 'Feilen er (' . $db->error . ')');
	}
	
	// Finn antall rader fra kjørt spørring
	$numberRowsInResultSet = $result->num_rows;
	print 'Antall rader Saksmappe som vi kan forvente er (' . 
			$numberRowsInResultSet . ')' . PHP_EOL;
	
	// Bla gjennom alle rader (resultat av spørring)
	while($row = $result->fetch_assoc()){
		// Vise hele array av felter for denne rad (i tabellen for Saksmappe)
		print_r($row);
	}
	
	// Lukke objekter
	$result->free();	
	$db->close();	
	
?>
