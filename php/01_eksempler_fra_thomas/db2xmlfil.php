<?php

	$IPAdresse = ""; // Denne blir utdelt
	$databasenavn = "noark5";
	$brukernavn = "noarkBruker";
	$passord = "noarkPassord";
	
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);

	print "Prøver å opprette kobling til ";
	print "maskin (" . $IPAdresse . "), ";
	print "database (" . $databasenavn . "), ";
	print "brukernavn (" . $brukernavn . "), ";
	print "passord (" . $passord . ")" . PHP_EOL;

	if($db->connect_errno > 0){
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
	
	$filnavn = "uttrekk.xml";
	$arkivFil = fopen($filnavn, "w");
	
	$numberArkivRows = $resultArkiv->num_rows;
	print "Antall arkiv som vi kan forvente er (" . 
			$numberArkivRows . ")" . PHP_EOL;

	if ($numberArkivRows > 0) {
		fwrite($arkivFil, '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL);
		fwrite($arkivFil, "<arkiv>" .  PHP_EOL);

		while($rowArkiv = $resultArkiv->fetch_assoc()){
			fwrite(	$arkivFil, "\t<arkiv>" .  PHP_EOL);
			fwrite(	$arkivFil, "\t\t<systemId>" . $rowArkiv['system_id'] . "</systemId>" . PHP_EOL);
			fwrite(	$arkivFil, "\t\t<tittel>" . $rowArkiv['title'] ."</tittel>" . PHP_EOL);
			fwrite(	$arkivFil, "\t\t<beskrivelse>" . $rowArkiv['description'] ."</beskrivelse>" . PHP_EOL);		
			fwrite(	$arkivFil, "\t</arkiv>" .  PHP_EOL);
		}
		fwrite($arkivFil, "</arkiv>" .  PHP_EOL);
	}
	fflush($arkivFil);
	fclose($arkivFil);
	
	$resultArkiv->free();	
	$db->close();

?>

