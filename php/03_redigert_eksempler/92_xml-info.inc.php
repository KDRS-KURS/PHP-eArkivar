<?php

	// ...inc.php

	// Parametre for xml-filer
	
	// db2xml: Hc = Hardkodet (skriver alle xml-elementer og tags fra PHP-kode direkte)	
	$xmlHcFilnavnUtTest = 'uttrekk-test-Hc.xml';	// standardverdi = 'uttrekk-test-Hc.xml'
	
	// db2xml: Dom = Document Object Model
	$xmlDomFilnavnUtTest = 'uttrekk-test-dom.xml';	// standardverdi = 'uttrekk-test-Dom.xml'
	$xmlDomFilnavnUtSql = 'uttrekk-sql-dom.xml';	// standardverdi = 'uttrekk-sql-Dom.xml'
	
	// db2xml: Sax = Simple API for Xml
	$xmlSaxFilnavnUtTest = 'uttrekk-test-sax.xml';	// standardverdi = 'uttrekk-test-Sax.xml'
	$xmlSaxFilnavnUtSql = 'uttrekk-sql-sax.xml';	// standardverdi = 'uttrekk-sql-Sax.xml'
	$xmlSaxFilnavnUtSql_temp = 'uttrekk-sql-sax_temp.xml';	// standardverdi = 'uttrekk-sql-Sax_temp.xml'
	$xmlSaxFilnavnUtSql_temp2 = 'uttrekk-sql-sax_temp2.xml';	// standardverdi = 'uttrekk-sql-Sax_temp2.xml'
	
	// read: SimpleXML (DOM)
	$xmlReadSimpleXML = 'arkivstruktur.xml';	// standardverdi 'arkivuttrekk.xml'
	
	// read: DOM
	$xmlReadDOM = 'arkivstruktur.xml';	// standardverdi 'arkivuttrekk.xml'
	
	// read: SAX (XMLReader)
	$xmlReadSAX = 'arkivstruktur.xml';	// standardverdi 'arkivuttrekk.xml'
	$xmlReadSAX2 = 'arkivstruktur2.xml';	// standardverdi 'arkivuttrekk2.xml'
	$xmlReadSAX3 = 'arkivstruktur3.xml';	// standardverdi 'arkivuttrekk3.xml'
	
	// xml Header
	$xmlHeader = '<?xml version="1.0" encoding="UTF-8"?>';
	
	// Nivå 1 Arkiv
	$bolXmlArkiv = True;	// True = Ta med Arkiv i Xml
	$bolXmlVisArkiv = True;	// False = ikke vis Arkiv i konsollvindu
	
	// Nivå 2 Arkivdel
	$bolXmlArkivdel = True;	// True = Ta med Arkivdel i Xml
	$bolXmlVisArkivdel= True;	// False = ikke vis Arkivdel i konsollvindu
	
	// Nivå 3 Saksmappe
	$bolXmlSaksmappe = True;	// True = Ta med Saksmappe i Xml
	$numXmlSaksmappeLimit = 0;	// 0 = Unlimited, ta med alle rader Saksmappe i xml
	$bolXmlVisSaksmappe = True;	// False = ikke vis saksmapper i konsollvindu
	$numXmlVisSaksmappeLimit = 2;	// 0 = Unlimited, > 0 = vis begrenset antall i konsollvindu
	
?>
