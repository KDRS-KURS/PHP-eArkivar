<?php

	// Kode for SQL-spørring mot database og XML SAX skrive til fil (XMLWriter)
	// MERK: Mellomversjon som arver visning til skjerm i 3 modi fra print konsoll versjon
	// ERSTATTES: av 08_db2xml_sax.php som forenkler print konsoll og presiserer xml output
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Koble til databasen;
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);
	
	// Generelle parametre
	$thisXmlMetode = 'XML SAX XMLWriter';
	$filnavn = $xmlSaxFilnavnUtSql_temp2;
	$countArkiv = 0;
	$countArkivdel = 0;
	$countSaksmappe = 0;
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	// PHP start
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	
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
		
		// XML root-element <uttrekk> med atributter
		$addmlSAX->startElement('uttrekk');
		$addmlSAX->writeAttribute('xml_write_metode', $thisXmlMetode);
		$addmlSAX->writeAttribute('xml_timestamp', $strStartDateTime);
		$addmlSAX->writeAttribute('php_script', $thisPhpScript);

		while($rowArkiv = $resultArkiv->fetch_assoc()){
			$countArkiv += 1;
			
			// Ta med XML element <arkiv> hvis aktivert
			if ($bolVisArkiv) {
				$addmlSAX->startElement('arkiv');
				foreach ($rowArkiv as $rowKey => $rowValue) {
					$addmlSAX->writeElement($rowKey, $rowValue);
				}
			}
			
			// Nivå 2 Arkivdel
			print 'II: Arkivdel';
			print PHP_EOL;
			$countArkivdel = 0;	// Resette teller ved start av hvert Arkiv
			
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
				
				// Ta med XML element <arkivdel> hvis aktivert
				if ($bolVisArkivdel) {
					// XML SAX (XMLWriter)
					$addmlSAX->startElement('arkivdel');
					foreach ($rowArkivdel as $rowKey => $rowValue) {
						$addmlSAX->writeElement($rowKey, $rowValue);
					}
					
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
				}	// end if ($bolVisArkivdel)		
				
				// Nivå 3 Saksmappe
				print 'III: Saksmappe';
				print PHP_EOL;
				$countSaksmappe = 0;	// Resette teller ved start av hver Arkivdel
				
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
						// Ta med XML element <saksmappe> hvis aktivert
						if ($bolVisSaksmappe) {
							// XML SAX (XMLWriter)
							$addmlSAX->startElement('saksmappe');
							foreach ($rowSaksmappe as $rowKey => $rowValue) {
								$addmlSAX->writeElement($rowKey, $rowValue);
							}
	
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
					if ($bolVisSaksmappe) {
						$addmlSAX->endElement();	// </saksmappe>
					}
				}	// end while Saksmappe
				
				// Saksmappe teller
				if (($countSaksmappe > $numSaksmappeLimit) AND ($numSaksmappeLimit > 0)) {
					if ($bolBreakSaksmappeLimit) {
						print 'Stopper etter ' . ($countSaksmappe-1) . ' Saksmapper' . PHP_EOL;
						print PHP_EOL;
					} else {
						print 'Stopper etter ' . $numSaksmappeLimit . ' Saksmapper av totalt ' . $countSaksmappe . PHP_EOL;
						print PHP_EOL;
					}
				} else {
					print 'Totalt ' . $countSaksmappe . ' Saksmapper' . PHP_EOL;
					print PHP_EOL;
				}
				
				if ($bolVisArkivdel) {
					$addmlSAX->endElement();	// </arkivdel>
				}
			}	// end while Arkivdel
			if ($bolVisArkiv) {
				$addmlSAX->endElement();	// </arkiv>
			}
		}	// end while Arkiv
		
		$addmlSAX->endElement();	// </uttrekk>
		$addmlSAX->endDocument();
		$addmlSAX->flush();
		
		print $thisXmlMetode . ' lagre fil [' . $filnavn . ']' . PHP_EOL;
		
	} else {
		print 'IKKE lagret ' . $thisXmlMetode . ' til fil fordi ingen arkiv-rader funnet i database-tabell' . PHP_EOL;
	}
	
	// PHP slutt
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	print 'PHP slutt [' . $strEndDateTime . ']' . PHP_EOL;
		
?>
