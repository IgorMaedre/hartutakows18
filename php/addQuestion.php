<!DOCTYPE html>
<html>
	<head>
		<meta name="eduki-mota" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Add question</title>
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
		<script src="../js/addQuestion.js"></script>
		<script src="../js/addImage.js"></script>
		<script src="../js/removeImage.js"></script>
		
	</head>
	<body>
		<div id='page-wrap'>
			<header class='main' id='h1'>
				<span class="loginekoak"><a href="layout.php">LogOut</a> </span>
				<a id="backButton" href=javascript:history.go(-1);> <img src="../images/atrás.png" width="40" height="40"></a>
				<div id="logInfo"></div>
				<h2>Add question</h2>
			</header>
			
			<nav class='main' id='n1' role='navigation'>
				<span><a href='<?php $id=$_GET['logged']; echo "layout.php?logged=$id"; ?>'>Home</a></span>
				<span><a href='<?php $id=$_GET['logged']; echo "layout.php?logged=$id"; ?>'>Quizzes</a></span>
				<span><a href='<?php $id=$_GET['logged']; echo "showQuestions.php?logged=$id"; ?>'>Show questions</a></span>
				<span><a href='<?php $id=$_GET['logged']; echo "credits.php?logged=$id"; ?>'>Credits</a></span>
				
			</nav>
			
			<section class="main" id="s1">
				<div>
				<form id="formularioa" name="formularioa" action="<?php echo "addQuestion.php?logged=$id"?>" method="post" enctype="multipart/form-data">
					Egilearen eposta (*): <input type="text" class="input" id="eposta" name="eposta" size="50"/> </br></br>
					Galderaren testua (*): <input type="text" class="input" id="galdera" name="galdera" size="110"/> </br></br>
					Erantzun zuzena (*): <input type="text" class="input" id="erantzunZuzena" name="erantzunZuzena" size="110"/> </br></br>
					Erantzun okerra1 (*): <input type="text" class="input" id="erantzunOkerra1" name="erantzunOkerra1" size="110"/> </br></br>
					Erantzun okerra2 (*): <input type="text" class="input" id="erantzunOkerra2" name="erantzunOkerra2" size="110"/> </br></br>
					Erantzun okerra3 (*): <input type="text" class="input" id="erantzunOkerra3" name="erantzunOkerra3" size="110"/> </br></br>
					Galderaren zailtasuna (0 eta 5 artekoa) (*): <select class="input" id="zailtasuna" name="zailtasuna">
																	<option value="0">0</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																</select> <br><br>
					Galderaren gai-arloa (*): <input type="text" class="input" id="arloa" name="arloa"/> </br></br>
					Irudia (hautazkoa): <input type="file" class="input" id="fitxategia" name="fitxategia"/> </br></br>
					<div id="divIrudi"></div>
					
					<input type="submit" value="     Bidali     "/>
					<input type="reset" value="     Garbitu     "/>
				</form>
				</div>
				
			</section>

			<footer class='main' id='f1'>
				<a href='https://github.com'>Link GITHUB</a>
			</footer>
		</div>	
	</body>
</html>

<?php

	include("userInfo.php");
	echo '<script> $("#eposta").attr("readonly", true) </script>';
	
	if(isset($_POST['eposta'])) {
		$galdera = preg_replace('/\s\s+/', ' ', trim($_POST['galdera']));
		$erantzunZuzena = $_POST['erantzunZuzena'];
		$erantzunOkerra1 = $_POST['erantzunOkerra1'];
		$erantzunOkerra2 = $_POST['erantzunOkerra2'];
		$erantzunOkerra3 = $_POST['erantzunOkerra3'];
		$zailtasuna = $_POST['zailtasuna'];
		$arloa = $_POST['arloa'];
		$irudiTamaina = $_FILES['fitxategia']['size'];
		if($irudiTamaina > 0) {
			$irudiIzena = $_FILES['fitxategia']['name'];
			$irudia = addslashes(file_get_contents($_FILES['fitxategia']['tmp_name']));
		}

		
		$erroreak = "";
		if (empty($galdera)) $erroreak = $erroreak . "(*) Galderaren testua zehaztu gabe dago\\n";
		else if (strlen($galdera) < 10) $erroreak = $erroreak . "(*) Galderaren testua motzegia da, 10 ko luzera ez du gainditzen\\n";
		if (empty($erantzunZuzena)) $erroreak = $erroreak . "(*) Erantzun zuzena zehaztu gabe dago\\n";
		if (empty($erantzunOkerra1)) $erroreak = $erroreak . "(*) Erantzun okerra1 zehaztu gabe dago\\n";
		if (empty($erantzunOkerra2)) $erroreak = $erroreak . "(*) Erantzun okerra2 zehaztu gabe dago\\n";
		if (empty($erantzunOkerra3)) $erroreak = $erroreak . "(*) Erantzun okerra3 zehaztu gabe dago\\n";
		if (empty($arloa)) $erroreak = $erroreak . "(*) Gai-arloa zehaztu gabe dago\\n";
		if ($irudiTamaina > 0) {
			$contains_jpg = preg_match("/\.jpg$/", $irudiIzena);
			$contains_jpeg = preg_match("/\.jpeg$/", $irudiIzena);
			$contains_png = preg_match("/\.png$/", $irudiIzena);
			$contains_JPG = preg_match("/\.JPG$/", $irudiIzena);
			$contains_JPEG = preg_match("/\.JPEG$/", $irudiIzena);
			$contains_PNG = preg_match("/\.PNG$/", $irudiIzena);
		
			if (!$contains_jpg && !$contains_jpeg && !$contains_png && !$contains_JPG && !$contains_JPEG && !$contains_PNG)
				$erroreak = $erroreak . "(hautazkoa) Irudiaren formatua okerra, irudiak '.jpg', '.jpeg', '.png', '.JPG', '.JPEG' edo '.PNG' luzapena eduki behar du";
		}

		if (!empty($erroreak)) echo '<script> alert("'.$erroreak.'"); </script>';
		else {				
			include("dbConfig.php");
			$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);				
			if(!$linki) echo '<script> alert("Konexio errorea"); </script>';
			else {
				$linki->query("INSERT INTO questions(eposta, galderaTestua, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, arloa, irudia) 
				values ('$eposta', '$galdera', '$erantzunZuzena', '$erantzunOkerra1', '$erantzunOkerra2', '$erantzunOkerra3', '$zailtasuna', '$arloa', '$irudia')");
				
				$linki = 0;
				echo '<script> alert("Zure galdera datu basera gehitu da"); </script>';
				
				
					
			}
		}
		
		
	}
	
	
	
	
	
?>






