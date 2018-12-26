<?php include('segurtasuna.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="eduki-mota" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Log in</title>
		<link rel='stylesheet' type='text/css' href='../styles/style.css' />
		<link rel='stylesheet' 
			   type='text/css' 
			   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
			   href='../styles/wide.css' />
		<link rel='stylesheet' 
			   type='text/css' 
			   media='only screen and (max-width: 480px)'
			   href='../styles/smartphone.css' />
		<script src="../js/jquery-3.2.1.js"></script>
	</head>
	<body>
		<div id='page-wrap'>
			<header class='main' id='h1'>
				<span><a href="logout.php">Log Out</a> </span>
				<a id="backButton" href=javascript:history.go(-1);> <img src="../images/atrás.png" width="40" height="40"></a>
				<h2>Handling Accounts</h2>
			</header>
			
			<nav class='main' id='n1' role='navigation'>
				<span><a href='<?php if (!empty($_GET['logged'])) {$id = $_GET['logged']; echo "layout.php?logged=$id";} else {echo "layout.php";} ?>'>Home</a></span>
				<span><a href='<?php if (!empty($_GET['logged'])) {$id = $_GET['logged']; echo "layout.php?logged=$id";} else {echo "layout.php";} ?>'>Quizzes</a></span>
				<span><a href='<?php $id=$_GET['logged']; echo "handlingAccounts.php?logged=$id"; ?>'>Manage accounts</a></span>
				<span><a href='<?php $id=$_GET['logged']; echo "credits.php?logged=$id"; ?>'>Credits</a></span>
			</nav>
			
			<section class="main" id="s1">
				<div id="acctable">
				
				<?php
					$erab = $_SESSION['user'];
					echo '<script>console.log("'.$erab.'");</script>';
					if ($erab == 'admin') {
						include("dbConfig.php");
						$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);
						if(!$linki) echo '<script> alert("Konexio errorea"); </script>';
						else {
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
					} else {echo '<p>This is not the correct user</p>';}
				?>			
				
				</div>
				<script>

				function aldatuEgoera(erabid) {
					if(confirm('Ziur zaude erabiltzaile hau desgaitu/aktibatu nahi duzula?')){
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								console.log('I smell pennies!');
								document.getElementById('acctable').innerHTML = this.responseText;
							}
						}
						xmlhttp.open('GET', 'changeAccState.php?userid=' +erabid, true);
						xmlhttp.send();
					}
				}

				function ezabatuKontua(erabid) {
					if (confirm('Ziur zaude ezabatu nahi duzula?')){
						var xmlhttp2 = new XMLHttpRequest();
						xmlhttp2.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById('acctable').innerHTML = this.responseText;
							}
						}
						xmlhttp2.open('GET', 'deleteAccount.php?userid=' +erabid, true);
						xmlhttp2.send();
					}
				}

				</script>
				
			</section>

			<footer class='main' id='f1'>
				<a href='https://github.com'>Link GITHUB</a>
			</footer>
		</div>	
	</body>
</html>