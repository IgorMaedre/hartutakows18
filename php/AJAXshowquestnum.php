<?php

	$erab = $_GET['erabiltzailea'];
	include("dbConfig.php");
	//$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);
	$linka = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);
	
	//if(!$link) echo "Konexio errorea</br>";
	if(mysqli_connect_errno()) echo "Konexio errorea</br>";
	else {			
		/*$resp1 = $linki->query("SELECT COUNT(ID) FROM questions");
		if($resp1->num_rows == 0) echo "Ez dago galderarik<br>";

		$resp2 = $linki->query("SELECT COUNT(ID) FROM question WHERE eposta = $erab");
		if($resp2->num_rows == 0) echo "Ez dago galderarik 2<br>";

		$val1 = $resp1->fetch_assoc();
		$val2 = $resp2->fetch_assoc();

		$text = "<p>Zure galderak: " . $val2['ID'] . " / " . $val1['ID'] . "</p>";*/

		if ($respa = $linka->query('SELECT * FROM questions')) {
			$vala = $respa->num_rows;
			$respa->close();
		}
		$linka->close();
	}
	$linkb = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);
	if(mysqli_connect_errno()) echo "Konexio errorea</br>";
	else {
		if ($respb = $linkb->query('SELECT * FROM questions WHERE eposta = "'.$erab.'"')) {
			$valb = $respb->num_rows;
			$respb->close();
		}
		$linkb->close();
	}

	

	$text = "<p>Zure galderak: " . $valb . " / " . $vala . "</p>";
	//echo $query;
	echo $text;
	


?>