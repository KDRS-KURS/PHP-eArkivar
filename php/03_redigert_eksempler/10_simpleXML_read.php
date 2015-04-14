<?php
	
	// Kode for SimpleXML lese fra fil
	// Leser xml-fil, finn mappe(r) og logg noe av innhold
	
	$xml = simplexml_load_file('arkivstruktur.xml');
	
	foreach($xml->arkiv->arkivdel->mappe as $mappe) {
		print 'systemID er (' . $mappe->systemID . ')' . PHP_EOL;
		print 'tittel er (' . $mappe->tittel . ')' . PHP_EOL;
	}
?>
