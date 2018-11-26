<?php
	
	if(isset($_POST['eposta'], $_POST['galdera'], $_POST['erantzunZuzena'], $_POST['erantzunOkerra1'], $_POST['erantzunOkerra2'],$_POST['erantzunOkerra3'], $_POST['zailtasuna'], $_POST['arloa'])) {
		$eposta = $_POST['eposta'];
		$galdera = preg_replace('/\s\s+/', ' ', trim($_POST['galdera']));
		$erantzunZuzena = $_POST['erantzunZuzena'];
		$erantzunOkerra1 = $_POST['erantzunOkerra1'];
		$erantzunOkerra2 = $_POST['erantzunOkerra2'];
		$erantzunOkerra3 = $_POST['erantzunOkerra3'];
		$zailtasuna = $_POST['zailtasuna'];
		$arloa = $_POST['arloa'];
		/*$irudiTamaina = $_FILES['fitxategia']['size'];
		if($irudiTamaina > 0) {
			$irudiIzena = $_FILES['fitxategia']['name'];
			$irudia = addslashes(file_get_contents($_FILES['fitxategia']['tmp_name']));
		}*/

		$erroreak = "";
		if (empty($galdera)) $erroreak = $erroreak . "(*) Galderaren testua zehaztu gabe dago\\n";
		else if (strlen($galdera) < 10) $erroreak = $erroreak . "(*) Galderaren testua motzegia da, 10 ko luzera ez du gainditzen\\n";
		if (empty($erantzunZuzena)) $erroreak = $erroreak . "(*) Erantzun zuzena zehaztu gabe dago\\n";
		if (empty($erantzunOkerra1)) $erroreak = $erroreak . "(*) Erantzun okerra1 zehaztu gabe dago\\n";
		if (empty($erantzunOkerra2)) $erroreak = $erroreak . "(*) Erantzun okerra2 zehaztu gabe dago\\n";
		if (empty($erantzunOkerra3)) $erroreak = $erroreak . "(*) Erantzun okerra3 zehaztu gabe dago\\n";
		if (empty($arloa)) $erroreak = $erroreak . "(*) Gai-arloa zehaztu gabe dago\\n";
		/*if ($irudiTamaina > 0) {
			$contains_jpg = preg_match("/\.jpg$/", $irudiIzena);
			$contains_jpeg = preg_match("/\.jpeg$/", $irudiIzena);
			$contains_png = preg_match("/\.png$/", $irudiIzena);
			$contains_JPG = preg_match("/\.JPG$/", $irudiIzena);
			$contains_JPEG = preg_match("/\.JPEG$/", $irudiIzena);
			$contains_PNG = preg_match("/\.PNG$/", $irudiIzena);
		
			if (!$contains_jpg && !$contains_jpeg && !$contains_png && !$contains_JPG && !$contains_JPEG && !$contains_PNG)
				$erroreak = $erroreak . "(hautazkoa) Irudiaren formatua okerra, irudiak '.jpg', '.jpeg', '.png', '.JPG', '.JPEG' edo '.PNG' luzapena eduki behar du";
		}*/

		if (!empty($erroreak)) echo $erroreak;
		else {				
			include("dbConfig.php");
			$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);				
			if(!$linki) echo '<script> alert("Konexio errorea"); </script>';
			else {
				$linki->query("INSERT INTO questions(eposta, galderaTestua, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, arloa) 
				values ('$eposta', '$galdera', '$erantzunZuzena', '$erantzunOkerra1', '$erantzunOkerra2', '$erantzunOkerra3', '$zailtasuna', '$arloa')");
				
				$linki = 0;
				$xml = simplexml_load_file('../questions.xml');
				$question = $xml->addChild('assessmentItem');

				$question->addAttribute('author', $eposta);
				$question->addAttribute('subject', $arloa);

				$gald = $question->addChild('itemBody');
				$erzuzena = $question->addChild('correctResponse');
				$erokerrak = $question->addChild('incorrectResponses');

				$gald->addChild('p', $galdera);
				$erzuzena->addChild('value', $erantzunZuzena);
				$erokerrak->addChild('value', $erantzunOkerra1);
				$erokerrak->addChild('value', $erantzunOkerra2);
				$erokerrak->addChild('value', $erantzunOkerra3);
				
				$xml->asXML('../questions.xml');
				echo 'Zure galdera datu basera gehitu da';
				
			}
		}
		
	}
	
?>