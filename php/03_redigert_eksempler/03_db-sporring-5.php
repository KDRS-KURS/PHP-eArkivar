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
	
	// Nivå 1 Arkiv
	// SQL-spørring: Les alle rader fra tabell 'fonds'
	$sqlArkiv = 'SELECT * FROM fonds';
	$resultArkiv = $db->query($sqlArkiv);
	
	if(!$resultArkiv){
		die('Det oppsto et problem med spørringen Arkiv (' . $sql . ').' . 
			 PHP_EOL . 'Feilen er (' . $db->error . ')');
	}

	// Finn antall rader Arkiv fra kjørt spørring
	$numberArkivRows = $resultArkiv->num_rows;
	print 'Antall rader Arkiv som vi kan forvente er (' . 
			$numberArkivRows . ')' . PHP_EOL;
	
	// Bla gjennom alle rader Arkiv (resultat av spørring)
	while($rowArkiv = $resultArkiv->fetch_assoc()){
		print '(Arkiv) SystemID er (' . $rowArkiv['system_id'] . ')' . PHP_EOL;
		print '(Arkiv) Navn er (' . $rowArkiv['title'] . ')' . PHP_EOL;
		print '(Arkiv) ArkivID er (' . $rowArkiv['pk_fonds_id'] . ')' . PHP_EOL;
		print PHP_EOL;
		
		// Nivå 2 Arkivdel
		// SQL-spørring: Les alle rader fra tabell 'series'
		$sqlArkivdel = 'SELECT * FROM series WHERE series_fonds_id = ' . "'" .
						$rowArkiv['pk_fonds_id'] . "'";
		$resultArkivdel = $db->query($sqlArkivdel);
		
		if(!$resultArkivdel){
			die('Det oppsto et problem med spørringen Arkivdel (' . $sqlArkivdel . ').' . 
				 PHP_EOL . 'Feilen er (' . $db->error . ')');
		}

		// Finn antall rader Arkivdel fra kjørt spørring
		$numberArkivdelRows = $resultArkivdel->num_rows;
		print 'Antall rader Arkivdel som vi kan forvente er (' . 
				$numberArkivdelRows . ')' . PHP_EOL;
		
		// Bla gjennom alle rader Arkivdel (resultat av spørring)
		while($rowArkivdel = $resultArkivdel->fetch_assoc()){
			print '(Arkivdel) SystemID er (' . $rowArkivdel['system_id'] . ')' . PHP_EOL;
			print '(Arkivdel) Navn er (' . $rowArkivdel['title'] . ')' . PHP_EOL;
			print '(Arkivdel) ArkivdelID er (' . $rowArkivdel['pk_series_id'] . ')' . PHP_EOL;
			print PHP_EOL;
			
			// Nivå 3 Saksmappe
			// SQL-spørring: Les alle rader fra tabell 'file'
			$sqlSaksmappe = 'SELECT * FROM file WHERE file_series_id = ' . "'" .
							$rowArkivdel['pk_series_id'] . "'";
			$resultSaksmappe = $db->query($sqlSaksmappe);
			
			if(!$resultSaksmappe){
				die('Det oppsto et problem med spørringen Saksmappe (' . $sqlSaksmappe . ').' . 
					 PHP_EOL . 'Feilen er (' . $db->error . ')');
			}

			// Finn antall rader Saksmappe fra kjørt spørring
			$numberSaksmappeRows = $resultSaksmappe->num_rows;
			print 'Antall rader Saksmappe som vi kan forvente er (' . 
					$numberSaksmappeRows . ')' . PHP_EOL;
			
			while($rowSaksmappe = $resultSaksmappe->fetch_assoc()){
				// print '(Arkivdel) SystemID er (' . $rowArkivdel['system_id'] . ')' . PHP_EOL;
				// print '(Arkivdel) Navn er (' . $rowArkivdel['title'] . ')' . PHP_EOL;
				// print '(Arkivdel) ArkivdelID er (' . $rowArkivdel['pk_series_id'] . ')' . PHP_EOL;
				print PHP_EOL;
				print_r($rowSaksmappe);
			
			}	// end while Saksmappe
		}	// end while Arkivdel
	}	// end while Arkiv
	
	// Lukke objekter
	if (isset($resultArkiv)) { $resultArkiv->free(); }
	if (isset($resultArkivdel)) { $resultArkivdel->free(); }
	if (isset($resultSaksmappe)) { $resultSaksmappe->free(); }
	$db->close();	
	
?>
