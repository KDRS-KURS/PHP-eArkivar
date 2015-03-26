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
		die("Det oppsto et problem med spørringen  (" . $sql . ")." . 
			 PHP_EOL . "Feilen er (" . $db->error . ")");
	}
	
	$numberArkivRows = $resultArkiv->num_rows;
	print "Antall arkiv som vi kan forvente er (" . 
			$numberArkivRows . ")" . PHP_EOL;

	while($rowArkiv = $resultArkiv->fetch_assoc()){
		print "(arkiv) SystemId er (" . $rowArkiv['system_id'] .")" . PHP_EOL;
				
		$sqlArkivdel = "SELECT * FROM series where series_fonds_id = '" .
					 $rowArkiv['pk_fonds_id'] . "'";		
		$resultArkivdel = $db->query($sqlArkivdel);
	
		if(!$resultArkivdel){
			die("\tDet oppsto et problem med spørringen  (" . $sqlArkivdel . ")." . 
				PHP_EOL . "Feilen er (" . $db->error . ")");
		}
				
		$numberArkivdelRows = $resultArkivdel->num_rows;
		print "\tAntall arkivdel som vi kan forvente er (" . 
				$numberArkivdelRows . ")" . PHP_EOL;
		
		while($rowArkivdel = $resultArkivdel->fetch_assoc()){
			print "\t(arkivdel) SystemId er (" . $rowArkivdel['system_id'] .")" . PHP_EOL;
			print "\t(arkivdel) Tittel er (" . $rowArkivdel['title'] .")" . PHP_EOL;
			print "\t(arkivdel) Beskrivelse er (" . $rowArkivdel['description'] .")" . PHP_EOL;
		}		
		$resultArkivdel->free();
	}

	$resultArkiv->free();	
	$db->close();	
?>
