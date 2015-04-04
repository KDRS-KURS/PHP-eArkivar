<?php

	// Kode for SQL-spørring mot database og skrive XML til fil
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Koble til databasen;
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);
	
	// Generelle parametre
	$filnavn = $xmlSaxFilnavnUtSql3;
	$countArkiv = 0;
	$countArkivdel = 0;
	$countSaksmappe = 0;
	
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
	print PHP_EOL;
	
	// Skriv XML til fil hvis arkiv-rader finnes
	if ($numberArkivRows > 0) {
		// Ny instans SAX XMLWriter
		$addmlSAX = new XMLWriter();
		$addmlSAX->OpenURI($filnavn);
		//$addmlSAX->OpenURI('php://output');
		$addmlSAX->startDocument('1.0','UTF-8');
		$addmlSAX->setIndent(true);

		$addmlSAX->startElement('uttrekk');

		while($rowArkiv = $resultArkiv->fetch_assoc()){
			$countArkiv += 1;
			
			// Ta med <arkiv> elementer hvis aktivert
			if ($bolXmlArkiv) {
				$addmlSAX->startElement('arkiv');
				foreach ($rowArkiv as $rowKey => $rowValue) {
					$addmlSAX->writeElement($rowKey, $rowValue);
				}
			}
			
			// B: Vis alle Arkivdel-kolonner
			if ($bolXmlVisArkiv) {
				foreach ($rowArkiv as $rowKey => $rowValue) {
					print '(Arkiv) ' . $rowKey . ' er (' . $rowValue . ')' . PHP_EOL;
				}
				print PHP_EOL;				
			}
			
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
				
				// Ta med <arkivdel> elementer hvis aktivert
				if ($bolXmlArkivdel) {
					// XML SAX (XMLWriter)
					$addmlSAX->startElement('arkivdel');
					foreach ($rowArkivdel as $rowKey => $rowValue) {
						$addmlSAX->writeElement($rowKey, $rowValue);
					}
				}
				
				// B: Vis alle Arkivdel-kolonner
				if ($bolXmlVisArkivdel) {
					foreach ($rowArkivdel as $rowKey => $rowValue) {
						print '(Arkivdel) ' . $rowKey . ' er (' . $rowValue . ')' . PHP_EOL;
					}
					print PHP_EOL;				
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
					
					// XML <saksmappe> elementer hvis aktivert
					if ($bolXmlSaksmappe) {
						if ((0 == $numXmlSaksmappeLimit) OR ($countSaksmappe <= $numXmlSaksmappeLimit)) {					
							// XML SAX (XMLWriter)
							$addmlSAX->startElement('saksmappe');
							foreach ($rowSaksmappe as $rowKey => $rowValue) {
								$addmlSAX->writeElement($rowKey, $rowValue);
							}
							$addmlSAX->endElement();	// </saksmappe>
						}
					}	// XML <saksmappe>
					
					// Print konsoll <saksmappe> elementer hvis aktivert
					if ($bolXmlVisSaksmappe) {
						if ((0 == $numXmlVisSaksmappeLimit) OR ($countSaksmappe <= $numXmlVisSaksmappeLimit)) {		
							// B: Vis alle Saksmappe-kolonner							
							foreach ($rowSaksmappe as $rowKey => $rowValue) {
								print '(Saksmappe) ' . $rowKey . ' er (' . $rowValue . ')' . PHP_EOL;
							}
							print PHP_EOL;
						}
					}	// print konsoll <saksmappe>
					
				}	// end while Saksmappe
				
				// Saksmappe teller print konsoll
				if ($bolXmlVisSaksmappe) {
					if ((0 == $numXmlVisSaksmappeLimit) OR ($countSaksmappe <= $numXmlVisSaksmappeLimit)) {
						print 'Alle ' . $countSaksmappe . ' Saksmapper til print konsoll';
						print PHP_EOL;
					} else {
						print 'Stopper etter ' . $numXmlVisSaksmappeLimit . ' Saksmapper til print konsoll';
						print PHP_EOL;
					}
				}
				
				// Saksmappe teller XML
				if ($bolXmlSaksmappe) {
					if ((0 == $numXmlSaksmappeLimit) OR ($countSaksmappe <= $numXmlSaksmappeLimit)) {
						print 'Alle ' . $countSaksmappe . ' Saksmapper til XML';
						print PHP_EOL;
					} else {
						print 'Stopper etter ' . $numXmlVisSaksmappeLimit . ' Saksmapper til XML';
						print PHP_EOL;
					}
				}
				
				if ($bolXmlArkivdel) {
					$addmlSAX->endElement();	// </arkivdel>
				}
			}	// end while Arkivdel
			if ($bolXmlArkiv) {
				$addmlSAX->endElement();	// </arkiv>
			}
		}	// end while Arkiv
		
		$addmlSAX->endElement();	// </uttrekk>
		$addmlSAX->endDocument();
		$addmlSAX->flush();
		
		print 'Lagret xml til fil ' . $filnavn . PHP_EOL;
		
	} else {
		print 'IKKE lagret xml til fil fordi ingen arkiv-rader funnet i database-tabell' . PHP_EOL;
	}
		
?>
