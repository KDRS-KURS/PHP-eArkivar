<?php

	$IPAdresse = ""; // Denne blir utdelt
	$databasenavn = "noark5";
	$brukernavn = "noarkBruker";
	$passord = "noarkPassord";
	
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);

	if($db->connect_errno > 0){
		print "Kunne ikke koble til database (" . $db->connect_error . ")" . PHP_EOL;
	}
	else {
		print "Koblet til database" . PHP_EOL;
	}
	
	$xml = simplexml_load_file("arkivstruktur.xml");

	$tables = array('series_storage_location', 'storage_location',  'document_object' , 'document_description', 'registry_entry',
					'basic_record', 'record', 'record_document_description', 'basic_record_author', 'basic_record_keyword',
					'case_file', 'file_keyword', 'file_keyword', 'file', 'keyword',
					'series', 'classification_system' ,'class_keyword' , 'class' , 'author',
					'fonds_storage_location', 'fonds_fonds_creator', 'fonds_creator', 'fonds');


	foreach($tables as $table) {
		$sqlTruncate = 'Delete from  ' . $table;
		print $sqlTruncate . PHP_EOL;
		$result = $db->query($sqlTruncate);	
	
		if(!$result){
			die("Det oppsto et problem med spørringen  (" . $sqlTruncate . ")." . 
				 PHP_EOL . "Feilen er (" . $db->error . ")");
		}
		
		$sqlSetAutoIncrement = 'ALTER TABLE '  . $table . '  AUTO_INCREMENT = 1';
		$result = $db->query($sqlSetAutoIncrement);	
	
		if(!$result){
			die("Det oppsto et problem med spørringen  (" . $sqlTruncate . ")." . 
				 PHP_EOL . "Feilen er (" . $db->error . ")");
		}

	}

	$fondsPKId = 1;
	$seriesPKId = 1;
	$mappeKId = 1;
	$registryEntryId = 1;
	$documentDescriptionId = 1;
	$dokumentObjektPKId = 1;
	
	foreach($xml->arkiv as $arkiv) {
	
		$sqlInsert = "INSERT INTO fonds (system_id, title, description, fonds_status, ";
		$sqlInsert = $sqlInsert . "document_medium, created_date, created_by, finalised_date,";
		$sqlInsert = $sqlInsert . "finalised_by) VALUES (";
		$sqlInsert = $sqlInsert . "'" . $arkiv->systemID . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->tittel . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->beskrivelse . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->arkivstatus . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->dokumentmedium . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->opprettetDato . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->opprettetAv . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->avsluttetDato . "', ";
		$sqlInsert = $sqlInsert . "'" . $arkiv->avsluttetAv . "'";
		$sqlInsert = $sqlInsert . ")";
		
		print "INSERT blir (" . $sqlInsert . ")" . PHP_EOL;
		
		$result = $db->query($sqlInsert);	
		if(!$result){
			die("Det oppsto et problem med spørringen  (" . $sqlInsert . ")." . 
				 PHP_EOL . "Feilen er (" . $db->error . ")");
		}

		
		foreach($arkiv->arkivdel as $arkivdel) {
			$sqlInsertArkivdel = "INSERT INTO series (system_id, title, description, series_status, ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "document_medium, created_date, created_by, finalised_date,";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "finalised_by, series_fonds_id) VALUES (";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->systemID . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->tittel . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->beskrivelse . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->arkivdelstatus . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->dokumentmedium . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->opprettetDato . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->opprettetAv . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->avsluttetDato . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $arkivdel->avsluttetAv . "', ";
			$sqlInsertArkivdel = $sqlInsertArkivdel . "'" . $fondsPKId . "'";
			$sqlInsertArkivdel = $sqlInsertArkivdel . ")";
			
			print "INSERT blir (" . $sqlInsertArkivdel . ")" . PHP_EOL;
			
			$resultArkivdel = $db->query($sqlInsertArkivdel);	
			if(!$resultArkivdel){
				die("Det oppsto et problem med spørringen  (" . $sqlInsertArkivdel . ")." . 
					 PHP_EOL . "Feilen er (" . $db->error . ")");
			}
			
			foreach($arkivdel->mappe as $mappe) {
		
				$sqlInsertMappe = "INSERT INTO file (system_id, title, description, ";
				$sqlInsertMappe = $sqlInsertMappe . "document_medium, created_date, created_by, finalised_date,";
				$sqlInsertMappe = $sqlInsertMappe . "finalised_by, file_series_id) VALUES (";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->systemID . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->tittel . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->beskrivelse . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->dokumentmedium . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->opprettetDato . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->opprettetAv . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->avsluttetDato . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $mappe->avsluttetAv . "', ";
				$sqlInsertMappe = $sqlInsertMappe . "'" . $seriesPKId . "'";
				$sqlInsertMappe = $sqlInsertMappe . ")";
				
				print "INSERT blir (" . $sqlInsertMappe . ")" . PHP_EOL;
				
				$resultMappe = $db->query($sqlInsertMappe);	
				if(!$resultMappe){
					die("Det oppsto et problem med spørringen  (" . $sqlInsertMappe . ")." . 
						 PHP_EOL . "Feilen er (" . $db->error . ")");
				} // if(!$resultMappe)
				
				
				foreach($mappe->registrering as $registrering) {
			
					$sqlInsertRegistrering = "INSERT INTO record (system_id,  ";
					$sqlInsertRegistrering = $sqlInsertRegistrering . " created_date, created_by, ";
					$sqlInsertRegistrering = $sqlInsertRegistrering . " archived_date, archived_by, record_file_id) VALUES (";
					$sqlInsertRegistrering = $sqlInsertRegistrering . "'" . $registrering->systemID . "', ";
					$sqlInsertRegistrering = $sqlInsertRegistrering . "'" . $registrering->opprettetDato . "', ";
					$sqlInsertRegistrering = $sqlInsertRegistrering . "'" . $registrering->opprettetAv . "', ";
					$sqlInsertRegistrering = $sqlInsertRegistrering . "'" . $registrering->arkivertDato . "', ";
					$sqlInsertRegistrering = $sqlInsertRegistrering . "'" . $registrering->arkivertAv . "', ";
					$sqlInsertRegistrering = $sqlInsertRegistrering . "'" . $mappeKId . "'";
					$sqlInsertRegistrering = $sqlInsertRegistrering . ")";
					
					print "INSERT blir (" . $sqlInsertRegistrering . ")" . PHP_EOL;
					
					$resultRegistrering = $db->query($sqlInsertRegistrering);	
					if(!$resultRegistrering){
						die("Det oppsto et problem med spørringen  (" . $sqlInsertRegistrering . ")." . 
							 PHP_EOL . "Feilen er (" . $db->error . ")");
					} // if(!$resultRegistrering)
					
					foreach($registrering->dokumentbeskrivelse as $dokumentbeskrivelse) {
				
						$sqlInsertdokumentBeskrivelse = "INSERT INTO document_description (system_id,  document_type, document_status, title,";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "  description, created_date, created_by, associated_with_record_as, ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "  document_number, association_date, associated_by" . /*, record_file_id*/ ") VALUES (";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->systemID . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->dokumenttype . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->dokumentstatus . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->tittel . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->beskrivelse . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->opprettetDato . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->opprettetAv . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->tilknyttetRegistreringSom . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->dokumentnummer . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->tilknyttetDato . "', ";
						//$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->tilknyttetAv . "', ";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $dokumentbeskrivelse->tilknyttetAv . "'";
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . "'" . $registryEntryId . "'";
						
						$sqlInsertdokumentBeskrivelse = $sqlInsertdokumentBeskrivelse . ")";
						
						print "INSERT blir (" . $sqlInsertdokumentBeskrivelse . ")" . PHP_EOL;
						
						$resultdokumentBeskrivelse = $db->query($sqlInsertdokumentBeskrivelse);	
						if(!$resultdokumentBeskrivelse){
							die("Det oppsto et problem med spørringen  (" . $sqlInsertdokumentBeskrivelse . ")." . 
								 PHP_EOL . "Feilen er (" . $db->error . ")");
						} // if(!$resultdokumentBeskrivelse)
						
						foreach($dokumentbeskrivelse->dokumentobjekt as $dokumentObjekt) {
				
							$sqlInsertdokumentObjekt = "INSERT INTO document_object (checksum,  checksum_algorithm, created_date, created_by,";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "  file_size,  format, variant_format, ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "  version_number, document_object_record_id) VALUES (";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->sjekksum . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->sjekksumAlgoritme . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->opprettetDato . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->opprettetAv . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->filstoerrelse . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->format . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->variantformat . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $dokumentObjekt->versjonsnummer . "', ";
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . "'" . $documentDescriptionId . "'";
							
							$sqlInsertdokumentObjekt = $sqlInsertdokumentObjekt . ")";
							
							print "INSERT blir (" . $sqlInsertdokumentObjekt . ")" . PHP_EOL;
							
							$resultdokumentBeskrivelse = $db->query($sqlInsertdokumentObjekt);	
							if(!$resultdokumentBeskrivelse){
								die("Det oppsto et problem med spørringen  (" . $sqlInsertdokumentObjekt . ")." . 
									 PHP_EOL . "Feilen er (" . $db->error . ")");
							} // if(!$resultdokumentBeskrivelse)
						} // foreach($registrering->dokumentbeskrivelse as $dokumentbeskrivelse)						
						$documentDescriptionId++;
					} // foreach($registrering->dokumentbeskrivelse as $dokumentbeskrivelse) 					
					$registryEntryId++;
				} // foreach($mappe->registrering as $registrering)				
				$mappeKId++;
			} // foreach($arkivdel->mappe as $mappe)
			$seriesPKId++;
		} //foreach($arkiv->arkivdel as $arkivdel) 		
		$fondsPKId++;	
	}
	//$dokumentBeskrivelsePKId
	$db->close();

?>

