<?php

	// ...inc.php

	// Parametre for tilkobling til database
		
	$IPAdresse = '127.0.0.1';
	// database på egen PC: $IPAdresse = 'localhost' eller = '127.0.0.1
	// database via nettverk f. eks.: $IPAdresse = '192.168.1.100'
	
	$brukernavn = 'noarkBruker'; // standardverdi = 'noarkBruker'
	$passord = 'noarkPassord'; // standardverdi = 'noarkPassord'
	$databasenavn = 'noark5'; // standardverdi = 'noark5'

	// Nivå 1 Arkiv
	$tabellArkiv = 'fonds';	// standardverdi = 'fonds'
	$keyArkiv = 'pk_fonds_id'; // standardverdi = 'pk_fonds_id'
	$bolVisArkiv = True;	// = False; ikke vis noe fra Arkiv
	$numArkivLimit = 0;	// 0 = Unlimited, vis alle rader med Arkiv
	// A: Velg Arkiv-kolonner med overskrift (spesifikt utvalg fra array)?
	$bolVisArkivColumnArray = True;
	// Array '<Kolonne Overskrift>' => '<Feltnavn>'
	$arrArkivColumn = array(
		'ArkivID' => 'pk_fonds_id',
		'ArkivNavn' => 'title',
		'SystemID' => 'system_id');
	// B: Velg alle Arkiv-kolonner (bla gjennom alle verdier)?
	$bolVisArkivAll = True;
	// C: Velg alle Arkiv-kolonner med print_r?
	$bolVisArkivPrintR = True;
	
	// Nivå 2 Arkivdel
	$tabellArkivdel = 'series';	// standardverdi = 'series'
	$keyArkivdel = 'pk_series_id'; // standardverdi = 'pk_series_id'
	$keyArkivdelArkiv = 'series_fonds_id';	// standardverdi 'series_fonds_id'
	$bolVisArkivdel = True;	// = False; ikke vis noe fra Arkivdel
	$numArkivdelLimit = 0;	// 0 = Unlimited, vis alle rader med Arkivdel
	// A: Velg Arkiv-kolonner med overskrift (spesifikt utvalg fra array)?
	$bolVisArkivdelColumnArray = True;
	// Array '<Kolonne Overskrift>' => '<Feltnavn>'
	$arrArkivdelColumn = array(
		'ArkivdelID' => 'pk_series_id',
		'ArkivdelNavn' => 'title',
		'SystemID' => 'system_id');
	// B: Velg alle Arkivdel-kolonner (bla gjennom alle verdier)?
	$bolVisArkivdelAll = True;
	// C: Velg alle Arkivdel-kolonner med print_r?
	$bolVisArkivdelPrintR = True;
	
	// Nivå 3 Saksmappe
	$tabellSaksmappe = 'file';	// standardverdi = 'file'
	$keySaksmappeArkivdel = 'file_series_id';	// standardverdi 'file_series_id'
	$bolVisSaksmappe = True;	// = False; ikke vis noe fra Saksmappe
	$numSaksmappeLimit = 2;	// 0 = Unlimited, vis alle rader med Saksmappe
	$bolBreakSaksmappeLimit = False; // = False, tell gjennom alle elementer (ikke vis)
	// A: Velg Saksmappe-kolonner med overskrift (spesifikt utvalg fra array)?
	$bolVisSaksmappeColumnArray = True;
	// Array '<Kolonne Overskrift>' => '<Feltnavn>'
	$arrSaksmappeColumn = array(
		'SaksmappeID' => 'pk_file_id',
		'SaksmappeNavn' => 'title',
		'SystemID' => 'system_id');	
	// B: Velg alle Saksmappe-kolonner (bla gjennom alle verdier)?
	$bolVisSaksmappeAll = True;
	// C: Velg alle Saksmappe-kolonner med print_r?
	$bolVisSaksmappePrintR = True;
	
?>
