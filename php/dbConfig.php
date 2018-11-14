<?php

	$lokal=1; // lokalean gauedenean 1; hodeian 0


	if ($lokal) {
	   $zerbitzaria="localhost";
	   $erabiltzailea="root";   // lokalean erabiltzailea root izan ohi da
	   $gakoa="";               // eta ez da pasahitzarik jartzen
	   $db="quiz";
	} else {
	   $zerbitzaria="localhost";
	   $erabiltzailea="id9999999_nineu";
	   $gakoa="";  // GitHub-en eremu hau EZABATU
	   $db="id9999999_quizdb";        // hodeiko db izena: hodeiko aurrizkia + zuek adierazitako db izena atzizki moduan

	} 

?>