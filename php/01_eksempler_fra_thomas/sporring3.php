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
	
	$sqlArkiv = "SELECT * FROM fonds";
	$resultArkiv = $db->query($sqlArkiv);
	
	if(!$resultArkiv){
		die("Det oppsto et problem med spørringen  (" . $sqlArkiv . ")." . 
			 PHP_EOL . "Feilen er (" . $db->error . ")");
	}
	
	$numberArkivRows = $resultArkiv->num_rows;
	print "Antall arkiv som vi kan forvente er (" . 
			$numberArkivRows . ")" . PHP_EOL;

	while($rowArkiv = $resultArkiv->fetch_assoc()){
		print "SystemId er (" . $rowArkiv['system_id'] .")" . PHP_EOL;
		print "Tittel er (" . $rowArkiv['title'] .")" . PHP_EOL;
		print "Beskrivelse er (" . $rowArkiv['description'] .")" . PHP_EOL;
	}

	$resultArkiv->free();	
	$db->close();	
?>
