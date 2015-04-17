<?php
	
	// Kode for XML SAX lese fra fil (XMLReader)
	// Leser en og en "node-type" fra start til slutt av xml-fil og logger innhold
	// Logger kun node-typer detektert og innhold fra første node av hver type
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Generelle parametre
	$thisPhpInfo = 'XML SAX XMLReader lese xml, analyse av all node-typer';
	$filnavn = $xmlReadSAX3;
	
	$lengthText = 8;	// =0 vis hele tekst i tekst-node, ellers = vis antall tegn
	$limitWhileLoopNode = 0;	// = 0 ikke bryt while-løkke med Node, ellers stopp etter x noder
	$bolVisAnalyseKunTreff = true;	// viser kun analyse av node-typer som blir detektert
	$bolVisAnalyseIngenTreff = true;	// viser analyse av node-typer uten treff under de med treff
	$bolVisAnalyseAlt = false;	// viser analysee av alle node-typer (selv om ikke detektert)
	
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
	// Nodetyper: ELEMENT, SIGNIFICANT_WHITESPACE, TEXT, END_ELEMENT
	// Skriver ut den første av hver detekterte nodetype sine properties
	// Teller antall forekomster av hver enkelt nodetype
	
	$bolDoWhile = True;
	$nWhileCount = 0;
	$arrNodeType = array();
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
				$arrNodeType[$i] = 'No node type';
			break;
			
			case $xml::ELEMENT:	// 1 Start element
				$strThisNode = '2 Start element';
				$arrNodeType[$i] = 'Start element';
			break;
			
			case $xml::ATTRIBUTE:	// 2 Attribute node
				$strThisNode = '2 Attribute node';
				$arrNodeType[$i] = 'Attribute node';
			break;
			
			case $xml::TEXT:	// 3 Text node
				$strThisNode = '3 Text node';
				$arrNodeType[$i] = 'Text node';
			break;
			
			case $xml::CDATA:	// 4 CDATA node
				$strThisNode = '4 CDATA node';
				$arrNodeType[$i] = 'CDATA';
			break;
			
			case $xml::ENTITY_REF:	// 5 Entity Reference node
				$strThisNode = '5 Entity Reference node';
				$arrNodeType[$i] = 'Entity Reference node';
			break;
			
			case $xml::ENTITY:	// 6 Entity Declaration node
				$strThisNode = '6 Entity Declaration node';
				$arrNodeType[$i] = 'Entity Declaration node';
			break;
			
			case $xml::PI:	// 7 Processing Instruction node
				$strThisNode = '7 Processiong Instruction node';
				$arrNodeType[$i] = 'Processing Instruction node';
			break;
			
			case $xml::COMMENT:	// 8 Comment node
				$strThisNode = '8 Comment node';
				$arrNodeType[$i] = 'Comment node';
			break;
			
			case $xml::DOC:	// 9 Document node
				$strThisNode = '9 Document node';
				$arrNodeType[$i] = 'Document node';
			break;
			
			case $xml::DOC_TYPE:	// 10 Document Type node
				$strThisNode = '10 Document Type node';
				$arrNodeType[$i] = 'Document Type node';
			break;
			
			case $xml::DOC_FRAGMENT:	// 11 Document Fragment node
				$strThisNode = '11 Document Fragment node';
				$arrNodeType[$i] = 'Document Fragment node';
			break;
			
			case $xml::NOTATION:	// 12 Notation node
				$strThisNode = '12 Notation node';
				$arrNodeType[$i] = 'Notation node';
			break;
			
			case $xml::WHITESPACE:	// 13 Whitespace node
				$strThisNode = '13 Whitespace node';
				$arrNodeType[$i] = 'Whitespace node';
			break;
			
			case $xml::SIGNIFICANT_WHITESPACE:	// 14 Significant Whitespace node
				$strThisNode = '14 Significant Whitespace node';
				$arrNodeType[$i] = 'Significant Whitespace node';
			break;
			
			case $xml::END_ELEMENT:	// 15 End element
				$strThisNode = '15 End element node';
				$arrNodeType[$i] = 'End element node';
			break;
			
			case $xml::END_ENTITY:	// 16 End Entity
				$strThisNode = '16 End Entity';
				$arrNodeType[$i] = 'End Entity';
			break;
			
			case $xml::XML_DECLARATION:	// 17 XML Declaration node
				$strThisNode = '17 XML Declaration node';
				$arrNodeType[$i] = 'XML Declaration node';
			break;
			
			default:
			
		}	// end switch
		
		// Set intial node info this type
		$arrNodeContent[$i] = ' stk. Node Type=' . $strThisNode;
	}	// for 
	
	// Dummy NodeType if any out of scope
	$arrNodeTypeCount[18] = 0;
	$arrNodeContent[18] = ' stk. Node Type=18 Dummy';
	$arrNodeType[18] = 'Dummy';
	
	// Begrense antall noder som skal analyseres?
	if ($limitWhileLoopNode > 0) {
		// Ja
		$bolCheckWhileLoopNodeLimit = true;
	} else {
		// Nei
		$bolCheckWhileLoopNodeLimit = false;
	}
	$bolWhileLoopNodeAborted = false;
	
	while ( $xml->read() ) {
		$nWhileCount++;
		$thisNodeText = '';
		
		// Begrense antall noder som skal analyseres?
		if ($bolCheckWhileLoopNodeLimit) {
			if ($nWhileCount >= $limitWhileLoopNode) {
				print 'Avslutter while loop etter lest ' . $limitWhileLoopNode . ' noder' . PHP_EOL;
				print PHP_EOL;
				$bolWhileLoopNodeAborted = true;
				break;
			}
		}
		
		// debug
//		$thisNodeType = $xml->nodeType;
//		print $nWhileCount . ' - ' . $thisNodeType . ' - ' . $arrNodeContent[$thisNodeType] . PHP_EOL;
		
		if  (!(array_key_exists($xml->nodeType, $arrNodeTypeCount))) {
			$arrNodeTypeCount[18]++;
			$thisNodeText = 'arrNodeTypeCount[' . "'" . $xml->nodeType . "'" . '] eksisterer ikke' . PHP_EOL;
			$strError .= $thisNodeText;
			
		} else {

			// Node-type teller
			if (0 == $arrNodeTypeCount[$xml->nodeType]) {
				$arrNodeTypeCount[$xml->nodeType] = 1;
			} else {	
				$arrNodeTypeCount[$xml->nodeType]++;
			}
			
			// Vis egenskaper til noden
			$thisNodeText = $arrNodeType[$xml->nodeType];
			
			if ('' !== $xml->name) {
				if ('#text' == $xml->name) {
					// Intet
				} elseif ($xml::ELEMENT == $xml->nodeType) {
					// 2 = Start element
					$thisNodeText .= ' <' . $xml->name . '>';
				} elseif ($xml::END_ELEMENT == $xml->nodeType) {
					// 15 = End element
					$thisNodeText .= ' </' . $xml->name . '>';
				} else {
					$thisNodeText .= ', name=' . $xml->name;
				}
			}
			
			if ($xml->hasAttributes) {
				$thisNodeText .= ', attr=' . $xml->attributeCount;
			}
			
			if ($xml->hasValue) {
				if ($xml::TEXT == $xml->nodeType) {
					if ($lengthText > 0) {
						if (strlen($xml->value) > $lengthText) {
							$thisNodeText .= ', value=[' . substr($xml->value, 0, $lengthText) . '...]';
						} else {
							$thisNodeText .= ', value=[' . $xml->value . ']';
						}
					} else {
						// Value på ny linje
						$thisNodeText .= ', value=' . PHP_EOL . '[' . $xml->value . ']';
					}
				} elseif ($xml::SIGNIFICANT_WHITESPACE == $xml->nodeType) {
					
				} else {
					$thisNodeText .= ', value=' . PHP_EOL . $xml->value;
				}
			}
			
			if ($xml->isDefault) {
				$thisNodeText .= ', is default';
			}
			
			if ($xml->isEmptyElement) {
				$thisNodeText .= ', is empty element';
			}
			
			if ($xml->isEmptyElement) {
				$thisNodeText .= ', is empty element';
			}
			
			if ('' !== $xml->depth) {
				$thisNodeText .= ', depth=' . $xml->depth;
			}
			
			if ('' !== $xml->prefix) {
				$thisNodeText .= ', prefix=' . $xml->prefix;
			}
			
			if ('' !== $xml->xmlLang) {
				$thisNodeText .= ', xml Lang=' . $xml->xmlLang;
			}
		}	// if arrayKeyExists...
		
		print $nWhileCount . ' : ' . $thisNodeText . PHP_EOL;
		
	}	// end while
	if (!$bolWhileLoopNodeAborted) {
		print PHP_EOL;
		print 'Fullført while loop etter lest ' . $nWhileCount . ' noder' . PHP_EOL;
		print PHP_EOL;
	}
	
	// Vis kun node-typer som er representert
	// Legg til tellere og presenter analyseresultater
	if ($bolVisAnalyseKunTreff) {
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
		for ($i=0; $i<19; $i++) {
			// print antall treff de ulike node-typer
			print $arrNodeTypeCount[$i] . $arrNodeContent[$i] . PHP_EOL;
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
