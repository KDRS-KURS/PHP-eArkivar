<?php
	
	// Kode for XML DOM lese fra fil
	// Leser xml-fil, finn mappe(r) og logg noe av innhold
	
	// Parametre for XML
	include_once '92_xml-info.inc.php';	// xml-filer parametre i egen fil
	
	// Generelle parametre
	$thisPhpInfo = 'XML DOM lese xml, printe "mappe"';
	$filnavn = $xmlReadDOM;
	$lengthText = 8;	// =0 vis hele tekst i tekst-node, ellers = vis antall tegn
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
	
	// Åpne DOM metode og xml-fil som skal leses
	$dom = new DOMDocument();
	
	if (!$dom->load($filnavn)) {
		// Feil: får ikke åpnet xml-fil
		die('Feil ved forsøk på å åpne xml-fil: [' . $filnavn . ']');
	} else {
		print 'Open XML DOM filnavn: [' . $filnavn . ']' . PHP_EOL;
	}
	print PHP_EOL;
	
	$alleMapper = $dom->getElementsByTagName('mappe');
	
	foreach($alleMapper as $mappe) {
		
		$systemIDElement = $mappe->getElementsByTagName('systemID');
		$systemID = $systemIDElement->item(0)->nodeValue;
		print 'systemID er (' . $systemID . ')' . PHP_EOL;
		
		$tittelElement = $mappe->getElementsByTagName('tittel');
		$tittel = $tittelElement->item(0)->nodeValue;
		print 'tittel er (' . $tittel . ')' . PHP_EOL;
	}
	print PHP_EOL;
	
	// PHP slutt
	$timeEnd = time();
	$strEndDateTime = date('Y-m-d\TH:i:sP', $timeEnd);
	print 'PHP slutt [' . $strEndDateTime . ']' . PHP_EOL;
	
?>
