<?php

	// Kode for SQL-spørring mot database
	
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
	
	// SQL-spørring: Les alle rader fra tabell 'fonds'
	$sql = 'SELECT * FROM fonds';
	$result = $db->query($sql);
	
	if(!$result){
		die('Det oppsto et problem med spørringen (' . $sql . ').' . 
			 PHP_EOL . 'Feilen er (' . $db->error . ')');
	}
	
	// Finn antall rader fra kjørt spørring
	$numberRowsInResultSet = $result->num_rows;
	print 'Antall rader Arkiv som vi kan forvente er (' . 
			$numberRowsInResultSet . ')' . PHP_EOL;
	
	// Bla gjennom alle rader (resultat av spørring)
	while($row = $result->fetch_assoc()){
		// Vis spesifikk(e) felt(er) for denne rad (i tabellen 'fonds')
		print 'Tittel er (' . $row['title'] .')' . PHP_EOL;
		print 'SystemID er (' . $row['system_id'] . ')' . PHP_EOL;
		print PHP_EOL;
		
		// Vise hele array av felter for denne rad (i tabellen 'fonds')
		print_r($row);
	}
	
	// Lukke objekter
	$result->free();	
	$db->close();	
	
?>
