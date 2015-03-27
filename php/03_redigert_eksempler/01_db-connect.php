<?php

	// Kode for test av oppkobling mot database
	
	// Parametre for tilkobling til database
	include_once '91_db-info.inc.php';	// database parametre i egen fil
	
	// Koble til databasen
	$db = new mysqli($IPAdresse, $brukernavn, $passord, $databasenavn);

	print "Prøver å opprette kobling til " . PHP_EOL;
	print "maskin (" . $IPAdresse . "), " . PHP_EOL;
	print "database (" . $databasenavn . "), " . PHP_EOL;
	print "brukernavn (" . $brukernavn . "), " . PHP_EOL;
	print "passord (" . $passord . ")" . PHP_EOL;

	if ($db->connect_errno > 0){
		print "Kunne ikke koble til database (" . $db->connect_error . ")" . PHP_EOL;
	}
	else {
		print "Koblet til database" . PHP_EOL;
	}
	
	// Lukke objekter
	$db->close();

?>
