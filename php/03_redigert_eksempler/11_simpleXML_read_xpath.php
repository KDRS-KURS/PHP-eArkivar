<?php
	
	// Kode for SimpleXML lese fra fil
	// Leser xml-fil, finn mappe(r) med XPath metode og logg noe av innhold
	
	$xml = simplexml_load_file('arkivstruktur.xml');
	$alleMapper = $xml->xpath('/arkiv/arkiv/arkivdel/mappe');
	
	foreach($alleMapper as $mappe) {
		print 'systemID er (' . $mappe->systemID . ')' . PHP_EOL;
		print 'tittel er (' . $mappe->tittel . ')' . PHP_EOL;
	}
?>
