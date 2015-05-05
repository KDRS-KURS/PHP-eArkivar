<?php
	
	// NO
	// Kode for analyse av XML-uttrekk (katalog med xml-filer).
	// Analyserer og logger innhold uten noen forhåndsinformasjon.
	// Bruker metode SAX XMLReader.
	
	// EN
	// Code analysis of xml-files (elements and attributes) in directory.
	// Using the SAX XMLReader extension (an XML Pull parser).
	// Going forward on the document stream and stopping at each node on the way.
	
	// Main PHP-script
	$strPhpScript = pathinfo(__file__)['basename'];	// Main PHP script
	
	// Inc sections
	include_once 'inc\init.inc.php';
	include_once 'inc\setup.inc.php';
	include_once 'inc\functions.inc.php';
	include_once 'inc\parse.inc.php';
	include_once 'inc\end.inc.php';
	
?>
