<?php

	$IPAdresse = ""; // Denne blir utdelt
	$databasenavn = "noark5";
	$databasenavn = "tildatabase";
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

	$addmlSAX = new XMLWriter();  
	$addmlSAX->openURI('uttrekk.xml');  
	//$addmlSAX->openURI('php://output');
	$addmlSAX->startDocument('1.0','UTF-8');
	$addmlSAX->setIndent(true);

	$addmlSAX->startElement('uttrekk');	
		while($rowArkiv = $resultArkiv->fetch_assoc()){		
			$addmlSAX->startElement('arkiv');
				$addmlSAX->writeElement('systemID', $rowArkiv['system_id']);
				$addmlSAX->writeElement('tittel', $rowArkiv['title']);
				$addmlSAX->writeElement('beskrivelse', $rowArkiv['description']);
				$addmlSAX->writeElement('arkivstatus', $rowArkiv['fonds_status']);
				$addmlSAX->writeElement('dokumentmedium', $rowArkiv['document_medium']);
				$addmlSAX->writeElement('opprettetDato', $rowArkiv['created_date']);
				$addmlSAX->writeElement('opprettetAv', $rowArkiv['created_by']);
				$addmlSAX->writeElement('avsluttetDato', $rowArkiv['finalised_date']);
				$addmlSAX->writeElement('avsluttetAv', $rowArkiv['finalised_by']);
			$addmlSAX->endElement();  // end arkiv						
		}
		
	$addmlSAX->endElement();  // end uttrekk	
			
	$addmlSAX->endDocument();   
	$addmlSAX->flush();		
	
	$resultArkiv->free();	
	$db->close();	
?>
