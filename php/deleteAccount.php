<?php

	$erabid = $_GET['userid'];
	echo '<script>console.log('.$erabid.');</script>';
	include("dbConfig.php");
	$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);
	if(!$linki) {
		echo '<script> console.log("Konexio errorea"); </script>';
	} else {
		$egoera = $linki->query("DELETE FROM users WHERE ID = '$erabid'");
		if (!$egoera) {
			echo '<script>console.log("Ezin izan da ezabatu");</script>';
		}
		$linki->close();
	}
	$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);
	if(!$linki) {
		echo '<script> console.log("Konexio errorea"); </script>';
	} else {
		$data = $linki->query("SELECT * FROM users");
		if ($data->num_rows == 0) echo '<p>Ez dago erabiltzailerik</p>';
		else {
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
			$linki->close();
		}

		
	}

?>