<?php

	$IPAdresse = ""; // Denne blir utdelt
	$databasenavn = "noark5";
	$brukernavn = "noarkBruker";
	$passord = "noarkPassord";
	
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);

	print "Prøver å opprette kobling til " . PHP_EOL;
	print "maskin (" . $IPAdresse . "), " . PHP_EOL;
	print "database (" . $databasenavn . "), " . PHP_EOL;
	print "brukernavn (" . $brukernavn . "), " . PHP_EOL;
	print "passord (" . $passord . ")" . PHP_EOL;

	if ($db->connect_errno > 0){
		print "Kunne ikke koble til database (" . $db->connect_error . ")" . PHP_EOL;
	}
	else {
		print "Koblet til database" . PHP_EOL;
	}
	
	$sql = "SELECT * FROM fonds";
	$result = $db->query($sql);
	
	if(!$result){
		die("Det oppsto et problem med spørringen  (" . $sql . ")." . 
			 PHP_EOL . "Feilen er (" . $db->error . ")");
	}
	
	$numberRowsInResultSet = $result->num_rows;
	print "Antall rader som vi kan forvente er (" . 
			$numberRowsInResultSet . ")" . PHP_EOL;
	
	while($row = $result->fetch_assoc()){
		print "Tittel er (" . $row['title'] .")" . PHP_EOL;
	}
	
	$result->free();	
	$db->close();	
	
?>
