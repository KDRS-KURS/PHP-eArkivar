<?php

	// Kode for SQL-spørring mot database
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
	// Variables
	$countArkiv = 0;
	$countArkivdel = 0;
	$countSaksmappe = 0;
	
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
	print 'I: Arkiv';
	print PHP_EOL;
	
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
	
	// Bla gjennom alle rader Arkiv (resultat av spørring)
	while($rowArkiv = $resultArkiv->fetch_assoc()){
		$countArkiv += 1;
		if ($bolVisArkiv) {
			// A: Vis valgte Arkiv-kolonner
			if ($bolVisArkivColumnArray) {
				foreach ($arrArkivColumn as $columnKey => $columnValue) {
					print '(Arkiv) ' . $columnKey . ' er (' . $rowArkiv[$columnValue] . ')' . PHP_EOL;
				}
				print PHP_EOL;
			}
			
			// B: Vis alle Arkiv-kolonner
			if ($bolVisArkivAll) {
				foreach ($rowArkiv as $rowKey => $rowValue) {
					print '(Arkiv) ' . $rowKey . ' er (' . $rowValue . ')' . PHP_EOL;
				}
				print PHP_EOL;
			}
			
			// C: Vis Arkiv print_r
			if ($bolVisArkivPrintR) {
				print_r($rowArkiv);
				print PHP_EOL;
			}
			
		} // Vis Arkiv
		
		// Nivå 2 Arkivdel
		print 'II: Arkivdel';
		print PHP_EOL;
		$countArkivdel = 0;
		
		// SQL-spørring Arkivdel: Les alle rader fra tabell i variabel $tabellArkivdel
		$sqlArkivdel = 'SELECT * FROM ' . $tabellArkivdel . ' WHERE ' . $keyArkivdelArkiv . ' = ' . "'" .
						$rowArkiv[$keyArkiv] . "'";
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
			$countArkivdel += 1;
			if ($bolVisArkivdel) {
				// A: Vis valgte Arkivdel-kolonner
				if ($bolVisArkivdelColumnArray) {
					foreach ($arrArkivdelColumn as $columnKey => $columnValue) {
						print '(Arkivdel) ' . $columnKey . ' er (' . $rowArkivdel[$columnValue] . ')' . PHP_EOL;
					}
					print PHP_EOL;
				}
				
				// B: Vis alle Arkivdel-kolonner
				if ($bolVisArkivdelAll) {
					foreach ($rowArkivdel as $rowKey => $rowValue) {
						print '(Arkivdel) ' . $rowKey . ' er (' . $rowValue . ')' . PHP_EOL;
					}
					print PHP_EOL;
				}
				
				// C: Vis Arkivdel print_r
				if ($bolVisArkivdelPrintR) {
					print_r($rowArkivdel);
					print PHP_EOL;
				}
			}			
			
			// Nivå 3 Saksmappe
			print 'III: Saksmappe';
			print PHP_EOL;
			$countSaksmappe = 0;
			
			// SQL-spørring Saksmappe: Les alle rader fra tabell i variabel $tabellSaksmappe
			$sqlSaksmappe = 'SELECT * FROM ' . $tabellSaksmappe . ' WHERE ' . $keySaksmappeArkivdel . ' = ' . "'" .
							$rowArkivdel[$keyArkivdel] . "'";
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
				$countSaksmappe += 1;
				// Begrenset antall Saksmapper i while-løkke
				if (($countSaksmappe > $numSaksmappeLimit) AND ($numSaksmappeLimit > 0)) {
					if ($bolBreakSaksmappeLimit) {
						// Exit while
						break;
					} else {
						// Ikke avbrutt while med 'break'
						
					}
				// Alle Saksmappene i while-løkke
				} else {
					if ($bolVisSaksmappe) {
						// A: Vis valgte Saksmappe-kolonner
						if ($bolVisSaksmappeColumnArray) {
							foreach ($arrSaksmappeColumn as $columnKey => $columnValue) {
								print '(Saksmappe) ' . $columnKey . ' er (' . $rowSaksmappe[$columnValue] . ')' . PHP_EOL;
							}
							print PHP_EOL;
						}
						
						// B: Vis alle Saksmappe-kolonner
						if ($bolVisSaksmappeAll) {
							foreach ($rowSaksmappe as $rowKey => $rowValue) {
								print '(Saksmappe) ' . $rowKey . ' er (' . $rowValue . ')' . PHP_EOL;
							}
							print PHP_EOL;
						}
						
						// C: Vis Saksmappe print_r
						if ($bolVisSaksmappePrintR) {
							print_r($rowSaksmappe);
							print PHP_EOL;
						}
					}
				}
			}	// end while Saksmappe
			
			// Saksmappe teller
			if (($countSaksmappe > $numSaksmappeLimit) AND ($numSaksmappeLimit > 0)) {
				if ($bolBreakSaksmappeLimit) {
					print 'Stopper etter ' . ($countSaksmappe-1) . ' Saksmapper';
					print PHP_EOL;
				} else {
					print 'Stopper etter ' . $numSaksmappeLimit . ' Saksmapper av totalt ' . $countSaksmappe;
					print PHP_EOL;
				}
			} else {
				print 'Totalt ' . $countSaksmappe . ' Saksmapper';
				print PHP_EOL;
			}
			
		}	// end while Arkivdel
	}	// end while Arkiv
	
	// Lukke objekter
	if (isset($resultArkiv)) { $resultArkiv->free(); }
	if (isset($resultArkivdel)) { $resultArkivdel->free(); }
	if (isset($resultSaksmappe)) { $resultSaksmappe->free(); }
	$db->close();	
	
?>
