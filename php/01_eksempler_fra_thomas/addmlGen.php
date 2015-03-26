<?php
	
	// Noen verider som vi antar er angitt
	$checksumAlgorithm = "SHA-256";
	$charset = "UTF-8";
	$recordSeparator = '\r\n';
	$fieldSeparatingChar = ';';
	// usikker om du skal angi feks " eller ' eller om det er true / false 
	$quotingChar = "false";


	$options = getopt("t:");

	if (isset($options["t"]) == false) {
		print "Tabellnavn ikke angitt. usage: php addmlGen.php -t tabellnavn" . PHP_EOL;
		exit;
	}
	
	$tableName = $options["t"];
	$tabellFilnavn = $tableName .".csv";
	$addmlFilnavn = $tableName . '_addml.xml';

	$IPAdresse = ""; // Denne blir utdelt
	$databasenavn = "tildatabase";
	$brukernavn = "noarkBruker";
	$passord = "noarkPassord";
	
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);
	
	if($db->connect_errno > 0){
		print "Kunne ikke koble til database (" . $db->connect_error . ")" . PHP_EOL;
		exit;
	}
	else {
		print "Koblet til database" . PHP_EOL;
	}

	
	$csvFil = fopen($tabellFilnavn, "w");	 

	if (!$csvFil) {
		print "Kunne ikke åpne csv-fil for skriving!" . PHP_EOL;
		exit;
	}
	
	
	print "Skriver innhold fra " . $tableName . " til filen " . $addmlFilnavn . PHP_EOL;
	$query = "SELECT * FROM " . $tableName;
		
	if($result = $db->query($query)){
		
		while($row = $result->fetch_assoc()){

			foreach ($row as $value) {
				fwrite ($csvFil, $value . $recordSeparator);
			} // foreach		
			fwrite ($csvFil, PHP_EOL);
		} // while
	}	// if	

	fflush($csvFil);
	fclose($csvFil);

	$addmlFilChecksum = hash_file ('sha256', $tabellFilnavn);
	
	$arkivskaper = "KDRS";
	$startDate = "20060401";
	$endDate = "20100401";
	$utgaendeSkille = "Skarpt";
	$inngaendeSkille = "Skarpt";
	
	$columnNameAndTypes = getColumnNameAndType($db, $tableName);
	$primaryKeys = getPrimaryKeys($db, $tableName);
	$foreignKeys = getForeignKeys($db, $tableName);
	$uniqueTypes = getUniqueTypes($columnNameAndTypes);

	$addmlSAX = new XMLWriter();  
	$addmlSAX->openURI($addmlFilnavn);  
	//$addmlSAX->openURI('php://output');
	$addmlSAX->startDocument('1.0','UTF-8');
	$addmlSAX->setIndent(true);

	$addmlSAX->startElement('addml');
	$addmlSAX->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
	$addmlSAX->writeAttribute('xmlns', 'http://www.arkivverket.no/standarder/addml');
	$addmlSAX->writeAttribute('xsi:schemaLocation', 'http://www.arkivverket.no/standarder/addml addml.xsd');
		
		$addmlSAX->startElement('dataset');
			// handle <reference> node
			$addmlSAX->startElement('reference');			
				// handle <context> node
				$addmlSAX->startElement('context');
						$addmlSAX->startElement('additionalElements');
							$addmlSAX->startElement('additionalElement');
								$addmlSAX->writeAttribute('name','recordCreators');
								$addmlSAX->startElement('additionalElements');																			
									$addmlSAX->startElement('additionalElement');
									$addmlSAX->writeAttribute('name','recordCreator');
										$addmlSAX->writeElement('value', $arkivskaper);
									$addmlSAX->endElement();  // end additionalElement
								$addmlSAX->endElement();  // end additionalElements
							$addmlSAX->endElement();  // end additionalElement
						$addmlSAX->endElement();  // end additionalElements
				$addmlSAX->endElement();  // end context				
				// handle <content> node
				$addmlSAX->startElement('content');
						$addmlSAX->startElement('additionalElements');
							$addmlSAX->startElement('additionalElement');
								$addmlSAX->writeAttribute('name','archivalPeriod');
								$addmlSAX->startElement('additionalElements');
									$addmlSAX->startElement('additionalElement');
									$addmlSAX->writeAttribute('name','startDate');
										$addmlSAX->writeElement('value', $startDate);
									$addmlSAX->endElement();  // end additionalElement
									$addmlSAX->startElement('additionalElement');
									$addmlSAX->writeAttribute('name','endDate');
										$addmlSAX->writeElement('value', $endDate);
									$addmlSAX->endElement();  // end additionalElement
									$addmlSAX->startElement('additionalElement');
										$addmlSAX->writeAttribute('name','period');
										$addmlSAX->startElement('additionalElements');
											$addmlSAX->startElement('additionalElement');
												$addmlSAX->writeAttribute('name','inngåendeSkille');											
												$addmlSAX->writeElement('value', $inngaendeSkille);
											$addmlSAX->endElement();  // end additionalElement
											$addmlSAX->startElement('additionalElement');
												$addmlSAX->writeAttribute('name','utgåendeSkille');
												$addmlSAX->writeElement('value', $utgaendeSkille);
											$addmlSAX->endElement();  // end additionalElement												
										$addmlSAX->endElement();  // end additionalElement
									$addmlSAX->endElement();  // end additionalElements
								$addmlSAX->endElement();  // end additionalElements
							$addmlSAX->endElement();  // end additionalElement
						$addmlSAX->endElement();  // end additionalElements
				$addmlSAX->endElement();  // end content			
			$addmlSAX->endElement();  // end reference
			// handle <flatfiles> node
			$addmlSAX->startElement('flatFiles');
				// handle <flatFile> node
				$addmlSAX->startElement('flatFile');
					$addmlSAX->writeAttribute('name', $tabellFilnavn);
					$addmlSAX->writeAttribute('definitionReference', 'fildef1');
				$addmlSAX->endElement();  // end content			
				// handle <flatFileDefinitions> node
				$addmlSAX->startElement('flatFileDefinitions');
					$addmlSAX->startElement('flatFileDefinition');
						$addmlSAX->writeAttribute('name', 'fildef1');
						$addmlSAX->writeAttribute('typeReference', 'typefildef1');
						$addmlSAX->startElement('recordDefinitions');
							$addmlSAX->startElement('recordDefinition');
								$addmlSAX->writeAttribute('name','postdef1');
								$addmlSAX->writeAttribute('typeReference', 'typepostdef1');
								$addmlSAX->startElement('keys');
									$addmlSAX->startElement('key');
										$addmlSAX->writeAttribute('name','primnokkel');
										$addmlSAX->startElement('primaryKey');
										$addmlSAX->endElement();  // end primaryKey
										
										$addmlSAX->startElement('fieldDefinitionReferences');
											foreach ($primaryKeys as $primaryKey) {						
												$addmlSAX->startElement('fieldDefinitionReference');
													$addmlSAX->writeAttribute('name', $primaryKey);
												$addmlSAX->endElement();  // end fieldDefinitionReference
											}
										$addmlSAX->endElement();  // end fieldDefinitionReferences
									$addmlSAX->endElement();  // end key

										foreach ($foreignKeys as $foreignKey) {																
											$addmlSAX->startElement('key');
												$addmlSAX->startElement('foreignKey');
													$addmlSAX->startElement('flatFileDefinitionReference');
														$addmlSAX->writeAttribute('name', $foreignKey['toTable']);
														$addmlSAX->startElement('recordDefinitionReferences');
															$addmlSAX->startElement('recordDefinitionReference');
																$addmlSAX->writeAttribute('name', 'BBB');
																	$addmlSAX->startElement('fieldDefinitionReferences');
																		$addmlSAX->startElement('fieldDefinitionReference');
																			$addmlSAX->writeAttribute('name', $foreignKey['toCol']);
																		$addmlSAX->endElement();  // end fieldDefinitionReference
																	$addmlSAX->endElement();  // end fieldDefinitionReferences
															$addmlSAX->endElement();  // end recordDefinitionReference
														$addmlSAX->endElement();  // end recordDefinitionReferences
													$addmlSAX->endElement();  // end flatFileDefinitionReference
													$addmlSAX->writeElement('relationType', 'unknown');
												$addmlSAX->endElement();  // end foreignKey
												$addmlSAX->startElement('fieldDefinitionReferences');
													$addmlSAX->startElement('fieldDefinitionReference');
														$addmlSAX->writeAttribute('name', $foreignKey['fromCol']);
													$addmlSAX->endElement();  // end flatFileDefinitionReference
												$addmlSAX->endElement();  // end fieldDefinitionReferences
											$addmlSAX->endElement();  // end key
										}
								$addmlSAX->endElement();  // end keys

								$addmlSAX->startElement('fieldDefinitions');
									foreach ($columnNameAndTypes as $columnNameAndType) {
										$addmlSAX->startElement('fieldDefinition');
											$addmlSAX->writeAttribute('name', $columnNameAndType['name']);
											$addmlSAX->writeAttribute('typeReference', $columnNameAndType['type']);
										$addmlSAX->endElement();  // end fieldDefinition
									}
								$addmlSAX->endElement();  // end fieldDefinitions
							$addmlSAX->endElement();  // end recordDefinition
						$addmlSAX->endElement();  // end recordDefinitions
					$addmlSAX->endElement();  // end flatFileDefinition
				$addmlSAX->endElement();  // end flatFileDefinitions
				// handle <structureTypes> node
				$addmlSAX->startElement('structureTypes');
					$addmlSAX->startElement('flatFileTypes');
						$addmlSAX->startElement('flatFileType');
							$addmlSAX->writeAttribute('name', 'typefildef1');														
							$addmlSAX->writeElement('charset', $charset);
							$addmlSAX->startElement('delimFileFormat');
							$addmlSAX->writeElement('recordSeparator', $recordSeparator);
							$addmlSAX->writeElement('fieldSeparatingChar', $fieldSeparatingChar);
							$addmlSAX->writeElement('quotingChar', $quotingChar);
							$addmlSAX->endElement();  // end delimFileFormat
						$addmlSAX->endElement();  // end flatFileType
					$addmlSAX->endElement();  // end flatFileTypes
					$addmlSAX->startElement('recordTypes');
						$addmlSAX->startElement('recordType');
							$addmlSAX->writeAttribute('name', 'typepostdef1');
						$addmlSAX->endElement();  // end recordType
					$addmlSAX->endElement();  // end recordTypes
					$addmlSAX->startElement('fieldTypes');
						foreach ($uniqueTypes as $uniqueType) {
							$addmlSAX->startElement('fieldType');
								$addmlSAX->writeAttribute('name', $uniqueType);
								$addmlSAX->writeElement('dataType', $uniqueType);
							$addmlSAX->endElement();  // end fieldType						
						}
					$addmlSAX->endElement();  // end fieldTypes
				$addmlSAX->endElement();  // end structureTypes
			$addmlSAX->endElement();  // end flatfiles
			
			// handle <dataObjects> node
			$addmlSAX->startElement('dataObjects');
				$addmlSAX->startElement('dataObject');
					$addmlSAX->writeAttribute('name', 'Rapport');
					$addmlSAX->startElement('dataObjects');
						$addmlSAX->startElement('dataObject');
							$addmlSAX->writeAttribute('name', 'csvfil');
							$addmlSAX->startElement('properties');
								$addmlSAX->startElement('property');
								$addmlSAX->writeAttribute('name', 'filnavn');
								$addmlSAX->writeElement('value', $tabellFilnavn);
								$addmlSAX->endElement();  // end property
								$addmlSAX->startElement('property');
									$addmlSAX->writeAttribute('name', 'checksum');
										$addmlSAX->startElement('properties');
											$addmlSAX->startElement('property');
												$addmlSAX->writeAttribute('name', 'algorithm');
												$addmlSAX->writeElement('value', $checksumAlgorithm);
											$addmlSAX->endElement();  // end property
											$addmlSAX->startElement('property');
												$addmlSAX->writeAttribute('name', 'value');
												$addmlSAX->writeElement('value', $addmlFilChecksum);
											$addmlSAX->endElement();  // end property											
										$addmlSAX->endElement();  // end properties
								$addmlSAX->endElement();  // end property								
							$addmlSAX->endElement();  // end properties
						$addmlSAX->endElement();  // end dataObject
					$addmlSAX->endElement();  // end dataObjects
				$addmlSAX->endElement();  // end dataObject
			$addmlSAX->endElement();  // end dataObjects

		$addmlSAX->endElement();  // end dataset
	$addmlSAX->endElement();  // end addml
	$addmlSAX->endDocument();   
	$addmlSAX->flush();		

	
	// Her avslutter skriptet, resten er funksjoner

	function getPrimaryKeys($db, $tableName) {
		$query = "SHOW KEYS FROM " . $tableName . " WHERE Key_name = 'PRIMARY'";
		$primaryKeys = array();
		
		if($result = $db->query($query)){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$primaryKeys[$i++] = $row['Column_name'];
			}
		}		
		return $primaryKeys;
		
	}	
	
	function getForeignKeys($db, $tableName) {
		$query = "SELECT COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM information_schema.key_column_usage WHERE table_name = '" . $tableName . "' AND CONSTRAINT_NAME != 'PRIMARY'";
		
		$query = "SELECT COLUMN_NAME, REFERENCED_TABLE_NAME, ";
		$query = $query . "REFERENCED_COLUMN_NAME FROM information_schema.key_column_usage ";
		$query = $query . "WHERE table_name = '" . $tableName . "' AND CONSTRAINT_NAME != 'PRIMARY'";
		
		$foreignKeys = array();
		
		if($result = $db->query($query)){
			$i = 0;
			while($row = $result->fetch_assoc()){
				$foreignKeys[$i++] = array ('fromCol' => $row['COLUMN_NAME'], 'toCol' => $row['REFERENCED_COLUMN_NAME'], 'toTable' => $row['REFERENCED_TABLE_NAME']);
			}
		}		
		return $foreignKeys;
	}

	function getUniqueTypes($columnNameAndTypes) {
		$uniqueTypes = array();

		foreach ($columnNameAndTypes as $columnNameAndType) {
			$uniqueTypes[] = $columnNameAndType['type'];
		}		
		$uniqueTypes = array_unique($uniqueTypes);
		return $uniqueTypes;
	}
	
	// Vi kan hente kolonenavn fra tabellen med DESCRIBE eller SHOW COLUMNS, men her velger jeg 
	// å ta en SELECT * fordi jeg vil sikre at jeg har riktig rekkefølge med data i filen
	function getColumnNameAndType($db, $tableName) {
		$query = "SELECT * FROM " . $tableName;
		$columnNameAndTypes = array();
		
		if($result = $db->query($query)){
			$i = 0;
			while ($columnInfo = $result->fetch_field()){
				$columnNameAndTypes[$i++] = array('name' => $columnInfo->name,'type' => findTypeFromValue($columnInfo->type));
			}
		}		
		return $columnNameAndTypes;
	}


	function findTypeFromValue($typeNumericValue) {
	
		switch ($typeNumericValue) {
			case MYSQLI_TYPE_BIT:
				return "BIT";
			case MYSQLI_TYPE_TINY:
				return "TINYINT";
			case MYSQLI_TYPE_SHORT:
				return "SMALLINT";
			case MYSQLI_TYPE_LONG:
				return "INT";
			case MYSQLI_TYPE_FLOAT:
				return "FLOAT";
			case MYSQLI_TYPE_DOUBLE:
				return "DOUBLE";
			case MYSQLI_TYPE_NULL:
				return "DEFAULT NULL";
			case MYSQLI_TYPE_TIMESTAMP:
				return "TIMESTAMP";
			case MYSQLI_TYPE_LONGLONG:
				return "BIGINT";
			case MYSQLI_TYPE_INT24:
				return "MEDIUMINT";
			case MYSQLI_TYPE_DATE:
				return "DATE";
			case MYSQLI_TYPE_TIME:
				return "TIME";
			case MYSQLI_TYPE_DATETIME:
				return "DATETIME";
			case MYSQLI_TYPE_YEAR:
				return "YEAR";
			case MYSQLI_TYPE_NEWDATE:
				return "DATE";
			case MYSQLI_TYPE_INTERVAL:
				return "INTERVAL";
			case MYSQLI_TYPE_ENUM:
				return "ENUM";
			case MYSQLI_TYPE_SET:
				return "SET";
			case MYSQLI_TYPE_TINY_BLOB:
				return "TINYBLOB";
			case MYSQLI_TYPE_MEDIUM_BLOB:
				return "MEDIUMBLOB";
			case MYSQLI_TYPE_LONG_BLOB:
				return "LONGBLOB";
			case MYSQLI_TYPE_BLOB:
				return "BLOB";
			case MYSQLI_TYPE_VAR_STRING:
				return "VARCHAR";
			case MYSQLI_TYPE_STRING:
				return "CHAR";				
			case MYSQLI_TYPE_CHAR:
				return "TINYINT";
				//	Field is defined as TINYINT. For CHAR, see MYSQLI_TYPE_STRING				
			case MYSQLI_TYPE_GEOMETRY:
				return "GEOMETRY";
			default:
				return "UNKNOWN TYPE";
		}
	}

?>
