<?php
	
	// Kode for XML SAX lese fra fil (XMLReader)
	// Leser en og en "node-type" fra start til slutt av xml-fil og logger innhold
	// Logger kun node-typer detektert og innhold fra første node av hver type
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Generelle parametre
	$thisPhpInfo = 'XML SAX XMLReader lese xml, analyse av all node-typer';
	$filnavn = $xmlReadSAX3;
	
	// Vis node analyse
	$lengthText = 8;	// =0 vis hele tekst i tekst-node, ellers = vis antall tegn
	$limitWhileLoopNode = 0;	// = 0 ikke bryt while-løkke med Node, ellers stopp etter x noder
	$bolVisAnalyseKunTreff = true;	// viser kun analyse av node-typer som blir detektert
	$bolVisAnalyseIngenTreff = true;	// viser analyse av node-typer uten treff under de med treff
	$bolVisAnalyseAlt = false;	// viser analysee av alle node-typer (selv om ikke detektert)
	
	// Vis element analyse
	$bolVisElementName = true;	// = true, vis alle detekterte <element> med teller
	$bolVisElementNameDepth = false;	// = true, vis alle detekterte <element><depth> med teller
	$bolVisElementDepthName = true;	// = true, vis alle detekterte <depth><element> med teller
	$bolVisElementDepthNameNoValue = true;	// = true, vis alle logiske nivåer UNNTATT siste nivå med verdier
	$bolVisElementDepthParentNameValue = true;	// = true, vis nivåre MED verdier, inklusiv prefix parent-elementer
	
	// PHP script
	$thisPhpScript = pathinfo(__file__)['basename'];
	
	// Timestamp
	$thisTimezone = 'Europe/Oslo';
	date_default_timezone_set($thisTimezone);
	$timeStart = time();
	$strStartDateTime = date('Y-m-d\TH:i:sP', $timeStart);
	
	// PHP start
	print PHP_EOL;
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	print 'PHP metode [' . $thisPhpInfo . ']' . PHP_EOL;
	print 'PHP filnavn [' . $thisPhpScript . ']' . PHP_EOL;
	
	// Åpne SAX XMLReader metode og xml-fil som skal leses
	$xml = new XMLReader();
	
	if (!$xml->open($filnavn, 'UTF-8')) {
		// Feil: får ikke åpnet xml-fil
		die('Feil ved forsøk på å åpne xml-fil: [' . $filnavn . ']');
	} else {
		print 'Open XML SAX XMLReader filnavn: [' . $filnavn . ']' . PHP_EOL;
	}
	print PHP_EOL;
	
	// Start analyse av hele xml der det gås til neste node med ->read()
	
	// # 1 NODE #
	// Nodetyper: ELEMENT, SIGNIFICANT_WHITESPACE, TEXT, END_ELEMENT
	// Skriver ut den første av hver detekterte nodetype sine properties
	// Teller antall forekomster av hver enkelt nodetype
	$bolDoWhile = True;
	$nWhileCount = 0;
	$arrNodeTypeCount = array();
	$arrNodeContent = array();
	$nErrorCount = 0;
	$strError = '';
	
	for ($i=0; $i<18; $i++) {
		// XMLReader Node Types
		$arrNodeTypeCount[$i] = 0;
		
		// Kunne vært hardkodet i stedet for for løkke + switch
		// Men ved å gjøre det med løkke kan koden gjenbrukes uten å måtte sette initiell teller = 0 f. eks.
		switch ($i) {
			case $xml::NONE:	// 0 No node type
				$strThisNode = '1 No node type';				
			break;
			
			case $xml::ELEMENT:	// 1 Start element
				$strThisNode = '2 Start element';
			break;
			
			case $xml::ATTRIBUTE:	// 2 Attribute node
				$strThisNode = '2 Attribute node';
			break;
			
			case $xml::TEXT:	// 3 Text node
				$strThisNode = '3 Text node';
			break;
			
			case $xml::CDATA:	// 4 CDATA node
				$strThisNode = '4 CDATA node';
			break;
			
			case $xml::ENTITY_REF:	// 5 Enity Reference node
				$strThisNode = '5 Enitity Reference node';
			break;
			
			case $xml::ENTITY:	// 6 Entity Declaration node
				$strThisNode = '6 Entity Declaration node';
			break;
			
			case $xml::PI:	// 7 Processing Instruction node
				$strThisNode = '7 Processiong Instruction node';
			break;
			
			case $xml::COMMENT:	// 8 Comment node
				$strThisNode = '8 Comment node';
			break;
			
			case $xml::DOC:	// 9 Document node
				$strThisNode = '9 Document node';
			break;
			
			case $xml::DOC_TYPE:	// 10 Document Type node
				$strThisNode = '10 Document Type node';
			break;
			
			case $xml::DOC_FRAGMENT:	// 11 Document Fragment node
				$strThisNode = '11 Document Fragment node';
			break;
			
			case $xml::NOTATION:	// 12 Notation node
				$strThisNode = '12 Notation node';
			break;
			
			case $xml::WHITESPACE:	// 13 Whitespace node
				$strThisNode = '13 Whitespace node';
			break;
			
			case $xml::SIGNIFICANT_WHITESPACE:	// 14 Significant Whitespace node
				$strThisNode = '14 Significant Whitespace node';
			break;
			
			case $xml::END_ELEMENT:	// 15 End element
				$strThisNode = '15 End element node';
			break;
			
			case $xml::END_ENTITY:	// 16 End Entity
				$strThisNode = '16 End Entity';
			break;
			
			case $xml::XML_DECLARATION:	// 17 XML Declaration node
				$strThisNode = '17 XML Declaration node';
			break;
			
			default:
			
		}	// end switch
		
		// Set intial node info this type
		$arrNodeContent[$i] = ' stk. Node Type=' . $strThisNode;
		
	}	// for 
	
	// Dummy NodeType if any out of scope
	$arrNodeTypeCount[18] = 0;
	$arrNodeContent[18] = ' stk. Node Type=18 Dummy';
	
	// Begrense antall noder som skal analyseres?
	if ($limitWhileLoopNode > 0) {
		// Ja
		$bolCheckWhileLoopNodeLimit = true;
	} else {
		// Nei
		$bolCheckWhileLoopNodeLimit = false;
	}
	$bolWhileLoopNodeAborted = false;
	
	// # 2 ELEMENT #
	$arrElementName = array();
	$arrElementNameDepth = array();
	$arrElementDepthName = array();
	
	$arrElementDepthNameNoValue = array();
	$arrElementDepthParentNameValue = array ();

	$arrElementStack = array();
	$nElementStack = 0;
	
	$strThisElement = '';
	$bolThisElementStart = false;
	$bolThisElementEnd = false;
	
	$strPrevElement = '';
	$strNextElement = '';
	
	while ( $xml->read() ) {
		$nWhileCount++;
		
		// Begrense antall noder som skal analyseres?
		if ($bolCheckWhileLoopNodeLimit) {
			if ($nWhileCount >= $limitWhileLoopNode) {
				print 'Avslutter while loop etter lest ' . $limitWhileLoopNode . ' noder' . PHP_EOL;
				print PHP_EOL;
				$bolWhileLoopNodeAborted = true;
				break;
			}
		}
		
		// Kjent Node Type?
		if  (!(array_key_exists($xml->nodeType, $arrNodeTypeCount))) {
			// Nei - Type 18 = ukjent type (error)
			$arrNodeTypeCount[18]++;
			$strError .= 'arrNodeTypeCount[' . "'" . $xml->nodeType . "'" . '] eksisterer ikke' . PHP_EOL;
				
		} else {
			// Ja - Node Type teller
			$arrNodeTypeCount[$xml->nodeType]++;
			
			// 
			switch ($xml->nodeType) {
				// ## Node Type: Høy prioritet ##
				case $xml::ELEMENT:	// 1 Start element
					print 'ELEMENT line starts here: ' . $xml->name . PHP_EOL;
					$strThisElement = $xml->name;
					
					// $arrElementStack
					$arrElementStack[$nElementStack] = $xml->name;
					$nElementStack++;
					
					// $arrElementName[<name>]
					if ($bolVisElementName) {
						if ( array_key_exists($xml->name, $arrElementName) ) {
							$arrElementName[$xml->name]++;
						} else {
							$arrElementName[$xml->name] = 1;
						}
					}
					
					// $arrElementNameDepth[<name>][<depth>]
					if ($bolVisElementNameDepth) {
						if ( isset($arrElementNameDepth[$xml->name][$xml->depth])  ) {
							$arrElementNameDepth[$xml->name][$xml->depth]++;
						} else {
							$arrElementNameDepth[$xml->name][$xml->depth] = 1;
						}
					}
					
					// $arrElementDepthName[<depth>][<name>]
					if ($bolVisElementDepthName) {
						if ( isset($arrElementDepthName[$xml->depth][$xml->name])  ) {
							$arrElementDepthName[$xml->depth][$xml->name]++;
						} else {
							$arrElementDepthName[$xml->depth][$xml->name] = 1;
						}
					}
					
					// $arrElementDepthNameNoValue[<depth>][<name>]
					
					
					// $arrElementDepthParentNameValue[<depth>][<parent>][<name>]
					
					print 'ELEMENT line stops here: ' . $xml->name . PHP_EOL;
				break;	// end ::ELEMENT
				
				case $xml::END_ELEMENT:	// 15 End element
					print 'END_ELEMENT line starts here: ' . $xml->name . PHP_EOL;
					// Sjekk på END_ELEMENT er unødvendig fordi 
					// XMLReader sjekker om START og END_ELEMENT korresponderer
					
					// $arrElementStack
					if ($xml->name == $arrElementStack[$nElementStack-1]) {
						// korrekt END_ELEMENT
						unset($arrElementStack[$nElementStack]);
						$nElementStack--;
					} else {
						// feil END_ELEMENT
						$strError .= 'Feil END_ELEMENT </' . $xml->name . '>, depth=' . $xml->depth . PHP_EOL;
						$arrElementStack[$nElementStack] = $xml->name;
						$nElementStack--;
					}
					print 'END_ELEMENT line stops here: ' . $xml->name . PHP_EOL;
				break;	// end ::END_ELEMENT
				
				
				// ## Node Type: Lav prioritet ##
				case $xml::NONE:	// 0 No node type
					
				break;
				
				case $xml::ATTRIBUTE:	// 2 Attribute node
					print 'ATTRIBUTE line starts here: ' . $xml->name . PHP_EOL;
					print 'attribute' . PHP_EOL;
					print 'ATTRIBUTE line stops here: ' . $xml->name . PHP_EOL;
				break;
				
				case $xml::TEXT:	// 3 Text node
					print 'TEXT line starts here: ' . $xml->name . PHP_EOL;
					print 'text value ' . $xml->value . PHP_EOL;
					print 'TEXT line stops here: ' . $xml->name . PHP_EOL;
				break;
				
				case $xml::CDATA:	// 4 CDATA node
					
				break;
				
				case $xml::ENTITY_REF:	// 5 Enity Reference node
					
				break;
				
				case $xml::ENTITY:	// 6 Entity Declaration node
					
				break;
				
				case $xml::PI:	// 7 Processing Instruction node
					
				break;
				
				case $xml::COMMENT:	// 8 Comment node
					
				break;
				
				case $xml::DOC:	// 9 Document node
					
				break;
				
				case $xml::DOC_TYPE:	// 10 Document Type node
					
				break;
				
				case $xml::DOC_FRAGMENT:	// 11 Document Fragment node
					
				break;
				
				case $xml::NOTATION:	// 12 Notation node
					
				break;
				
				case $xml::WHITESPACE:	// 13 Whitespace node
					
				break;
				
				case $xml::SIGNIFICANT_WHITESPACE:	// 14 Significant Whitespace node
					
				break;
				
				case $xml::END_ENTITY:	// 16 End Entity
					
				break;
				
				case $xml::XML_DECLARATION:	// 17 XML Declaration node
					
				break;
				
				default:
				
			}	// end switch
			
			
			
			
			// Vis verdier til denne noden (første av sin node-type som vi har funnet)				
			if ('' !== $xml->name) {

			}
			
			if ($xml->hasAttributes) {
				
			}
			
			if ($xml->hasValue) {

			}
			
			if ($xml->isDefault) {
				
			}
			
			if ($xml->isEmptyElement) {
				
			}
			
			if ($xml->isEmptyElement) {
				
			}
			
			if ('' !== $xml->depth) {
				
			}
			
			if ('' !== $xml->prefix) {
				
			}
			
			if ('' !== $xml->xmlLang) {
				
			}
			
		} // if Node Type exists
	
	}	// end while
	if (!$bolWhileLoopNodeAborted) {
		print 'Fullført while loop etter lest ' . $nWhileCount . ' noder' . PHP_EOL;
		print PHP_EOL;
	}
	
	// Vis kun node-typer som er representert
	// Legg til tellere og presenter analyseresultater
	if ($bolVisAnalyseKunTreff) {
		print 'Detekterte noder' . PHP_EOL;
		for ($i=0; $i<19; $i++) {
			if ($arrNodeTypeCount[$i] > 0) {				
				// print antall treff de ulike node-typer
				print $arrNodeTypeCount[$i] . $arrNodeContent[$i] . PHP_EOL;
			}
		}
		print PHP_EOL;
	}
	
	// Vis kun node-typer som IKKE er representert
	// Legg til tellere og presenter analyseresultater
	if ($bolVisAnalyseIngenTreff) {
		print 'Ikke-detekterte noder' . PHP_EOL;
		for ($i=0; $i<19; $i++) {
			if (0 == $arrNodeTypeCount[$i]) {				
				// print antall treff de ulike node-typer
				print '0' . $arrNodeContent[$i] . PHP_EOL;
			}
		}
		print PHP_EOL;
	}
	
	// Vis alle node-typer representert og IKKE representert sortert etter node type nr.
	// Legg til tellere og presenter analyseresultater
	if ($bolVisAnalyseAlt) {
		print 'Alle noder' . PHP_EOL;
		for ($i=0; $i<19; $i++) {
			// print antall treff de ulike node-typer
			print $arrNodeTypeCount[$i] . $arrNodeContent[$i] . PHP_EOL;
		}
		print PHP_EOL;
	}
	
	// $arrElementName[$xml->name]
	if ($bolVisElementName) {
		print 'Alle elementer' . PHP_EOL;
		foreach ($arrElementName as $rowKey => $rowValue) {
			print 'Element <' . $rowKey . '> antall = ' . $rowValue . PHP_EOL;
		}
		print PHP_EOL;
	}
	
	// $arrElementNameDepth[$xml->name][$xml->depth]
	if ($bolVisElementNameDepth) {
		print 'Alle elementer og dybde' . PHP_EOL;
		foreach ($arrElementNameDepth as $keyElement => $arrElementDepth) {
			foreach ($arrElementDepth as $keyDepth => $rowValue) {
				print 'Element <' . $keyElement . '><' . $keyDepth . '> antall = ' . $rowValue . PHP_EOL;
			}
			print PHP_EOL;
		}
		print PHP_EOL;
	}
	
	// $arrElementNameDepth[$xml->depth][$xml->name]
	if ($bolVisElementDepthName) {
		print 'Alle dybde og elementer' . PHP_EOL;
		foreach ($arrElementDepthName as $keyDepth => $arrElementName) {
			foreach ($arrElementName as $keyElement => $rowValue) {
				print 'Element <' . $keyDepth . '><' . $keyElement . '> antall = ' . $rowValue . PHP_EOL;
			}
			print PHP_EOL;
		}
		print PHP_EOL;
	}
	
	// $arrElementDepthNameNoValue[$xml->depth][$xml->name]
	if ($bolVisElementDepthNameNoValue) {
		print 'Alle elementer uten verdi' . PHP_EOL;
		foreach ($arrElementDepthNameNoValue as $keyDepth => $arrElementName) {
			foreach ($arrElementName as $keyElement => $rowValue) {
				print 'Element <' . $keyDepth . '><' . $keyElement . '> antall = ' . $rowValue . PHP_EOL;
			}
			print PHP_EOL;
		}
		print PHP_EOL;
	}
	
	// $arrElementDepthParentNameValue[$xml->depth][$parent][$xml->name]
	if ($bolVisElementDepthParentNameValue) {
		print 'Alle elementer med verdi' . PHP_EOL;
		foreach ($arrElementDepthParentNameValue as $keyDepth => $arrElementParentName) {
			foreach ($arrElementParentName as $keyParent => $arrElementName) {
				foreach ($arrElementParentName as $keyElement => $rowValue) {
					print 'Element <' . $keyDepth . '><' . $keyElement . '> antall = ' . $rowValue . PHP_EOL;
				}
			}
			print PHP_EOL;
		}
		print PHP_EOL;
	}
	
	// Error count
	print 'Antall feil = ' . $nErrorCount . PHP_EOL;
	if ('' !== $strError) {
		print 'Feilmeldinger:' . PHP_EOL;
		print $strError;
	}
	print PHP_EOL;
	
	// PHP slutt
	print 'PHP start [' . $strStartDateTime . ']' . PHP_EOL;
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	print 'PHP slutt [' . $strEndDateTime . ']' . PHP_EOL;
	
?>
