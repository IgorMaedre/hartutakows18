<?php

	if (isset($_POST['pasahitza']) && isset($_POST['eposta']) && isset($_POST['pasahitza erre'])) {
		
		$email = $_POST['eposta'];
		$newpw = $_POST['pasahitza'];
		$repeat = $_POST['pasahitza erre'];

		if ($newpw != $repeat) {
			
			include("dbConfig.php");
			$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);
			
			if(!$linki) echo '<script> alert("Konexio errorea"); </script>';
			else {
				
				$data = $linki->query("SELECT * FROM users WHERE eposta='".$eposta."'");		
				if($data->num_rows != 0) {

					$erabiltzailea = $data->fetch_assoc();
					$id = $erabiltzailea['ID'];
					$action = $linki->query("UPDATE users SET pasahitza = '".$newpw."' WHERE ID = '".$id."'");
					if ($action) {
						header('Location: login.php');
					} else {
						echo '<script> alert("Ezin izan da UPDATEa zuzen egin"); </script>';
					}
					
				} else {
					echo '<script> alert("Erabiltzaile hori ez da existitzen"); </script>';
				}
			}

		} else {
			echo '<script> alert("Bi pasahitzak ez dira berdinak!"); </script>';
		}

	} else {
		echo '<script> alert("Bete guztia!!"); </script>';
	}

?>