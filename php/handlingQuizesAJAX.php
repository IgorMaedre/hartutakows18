<?php include('segurtasuna.php') ?>
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
		<script>
			$(document).ready(function() {shownumbers();});

			function showfile() {
				var erabiltzailea = document.getElementById('eposta').value;
				var xmlhttp = new XMLHttpRequest();
				console.log(erabiltzailea);

				xmlhttp.onreadystatechange = function() {
					
					if (this.readyState == 4 && this.status == 200) {
						
						document.getElementById('xmltaula').innerHTML = this.responseText;

					}

				};

				xmlhttp.open('GET', 'AJAXshow.php?erabiltzailea=' + erabiltzailea, true);
				xmlhttp.send();
				shownumbers();

			}

			function shownumbers() {
				var erabiltzailea = document.getElementById('eposta').value;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					
					if (this.readyState == 4 && this.status == 200) {
						
						document.getElementById('questnum').innerHTML = this.responseText;

					}

				};

				xmlhttp.open('GET', 'AJAXshowquestnum.php?erabiltzailea=' + erabiltzailea, true);
				xmlhttp.send();
			}
		</script>
		

		
	</head>
	<body>
		<script src="../js/AJAXaddandshow.js"></script>
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
				<span><a href='<?php $id=$_GET['logged']; echo "handlingQuizesAJAX.php?logged=$id"; ?>'>Show your questions</a></span>
				<span><a href='<?php $id=$_GET['logged']; echo "credits.php?logged=$id"; ?>'>Credits</a></span>
				
			</nav>
			
			<section class="main" id="s1">
				<div>
				<form id="formularioa" name="formularioa" action="AJAXaddandshow.php" method="post" enctype="multipart/form-data" class="ajax">
					Egilearen eposta (*): <input type="text" class="input" id="eposta" name="eposta" size="30"/> 
					Galderaren testua (*): <input type="text" class="input" id="galdera" name="galdera" size="70"/> </br></br>
					Erantzun zuzena (*): <input type="text" class="input" id="erantzunZuzena" name="erantzunZuzena" size="30"/> 
					Galderaren zailtasuna (0 eta 5 artekoa) (*): <select class="input" id="zailtasuna" name="zailtasuna">
																	<option value="0">0</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																</select>
					Galderaren gai-arloa (*): <input type="text" class="input" id="arloa" name="arloa"/> </br></br>
					Erantzun okerra1 (*): <input type="text" class="input" id="erantzunOkerra1" name="erantzunOkerra1" size="30"/> 
					Erantzun okerra2 (*): <input type="text" class="input" id="erantzunOkerra2" name="erantzunOkerra2" size="30"/> 
					Erantzun okerra3 (*): <input type="text" class="input" id="erantzunOkerra3" name="erantzunOkerra3" size="30"/> </br></br>
					
					
					<!--Irudia (hautazkoa): <input type="file" class="input" id="fitxategia" name="fitxategia"/> </br></br>
					<div id="divIrudi"></div>-->
				</form>
				<button id="gorde" onclick="gorde()">   Gorde   </button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="erakutsi" onclick="showfile()">   Erakutsi   </button>

				<br><br><div id="questnum"></div>
								

				</div>

				<div>

				<table id="xmltaula"></table>
					
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
	echo '<script> $("#eposta").attr("readonly", false) </script>';
?>

