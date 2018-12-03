<?php

	$erabid = $_GET['userid'];
	//$jeje = 'kaka';
	//echo '<p>'.$erabid.'</p>';
	include("dbConfig.php");
	$linki2= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);
	if(!$linki2) {
		echo "<script> console.log('Konexio errorea'); </script>";
	} else {
		$egoera = $linki2->query("SELECT * FROM users WHERE ID ='$erabid'");
		$erabegoera = $egoera->fetch_assoc();
		if ($erabegoera['egoera'] == 0){ 
			$response = $linki2->query("UPDATE users SET egoera = 1 WHERE ID = '$erabid'");
		} else { 
			echo "<script> console.log('Else-an sartu naiz, baino zutaz paso egiten dut!') </script>";
			$response = $linki2->query("UPDATE users SET egoera = 0 WHERE ID = '$erabid'");
		}
		if (!$response) {
			echo "<script>console.log('Ezin izan da egoera aldatu');</script>";
		}
		$linki2->close();
	}
	$linki2= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);
	if(!$linki2) {
		echo '<script> console.log("Konexio errorea"); </script>';
	} else {
		$data = $linki2->query("SELECT * FROM users");
		if ($data->num_rows == 0) {
			echo '<p>Ez dago erabiltzailerik</p>';
		} else {
			$tableheader = '<table><tr><th>Name</th><th>Email</th><th>Password</th><th>Active State</th><th>Edit</th><th>Delete</th></tr>';
			$text = '';
			while ($erabiltzaile = $data->fetch_assoc()) {
				if ($erabiltzaile['ID'] == 28) {
					$tableheader .= '<tr><td>'.$erabiltzaile['deitura'].'</td><td>'.$erabiltzaile['eposta'].'</td><td>'.$erabiltzaile['pasahitza'].'</td><td>'.$erabiltzaile['egoera'].'</td></tr>';
				} else {
					$text .= '<tr><td>'.$erabiltzaile['deitura'].'</td><td>'.$erabiltzaile['eposta'].'</td><td>'.$erabiltzaile['pasahitza'].'</td><td>'.$erabiltzaile['egoera'].'</td><td><button type="button" onclick="aldatuEgoera('.$erabiltzaile['ID'].')">Aldatu</button></td><td><button type="button" onclick="ezabatuKontua('.$erabiltzaile['ID'].')">Ezabatu</button></td></tr>';
				}
			}
			$tableheader .= $text;
			$tableheader .= '</table><p>Egoerak: 0 -> Aktibo / 1 -> Ezgaituta </p>';
			echo $tableheader;
		}

		
	}
	$linki2->close();
	die();

?>