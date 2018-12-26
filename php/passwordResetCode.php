<?php session_start(); ?>
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

		<script>

			document.getElementById("eposta").onblur = function() {checkEmail()};
			function checkEmail() {
				var posta = document.getElementById("eposta").value;
				var xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange = function() {
						
					if (this.readyState == 4 && this.status == 200) {
							
						alert(this.responseText);

					}

				};
				xmlhttp.open('GET', 'checkEmail.php?erabiltzailea=' + posta, true);
				xmlhttp.send();
			}

		</script>
	</head>
	<body>
		<div id='page-wrap'>
			<header class='main' id='h1'>
				<span class="right"><a href="login.php">LogIn</a> </span>
				<span><a href="signUp.php">SignUp</a> </span>
				<a id="backButton" href=javascript:history.go(-1);> <img src="../images/atrás.png" width="40" height="40"></a>
				<h2>Aldatu Pasahitza</h2>
			</header>
			
			<nav class='main' id='n1' role='navigation'>
				<span><a href='layout.php'>Home</a></span>
				<span><a href='layout.php'>Quizzes</a></span>
				<span><a href='credits.php'>Credits</a></span>
				
			</nav>
			
			<section class="main" id="s1">
				<div>				
				<form action="passwordResetCode.php" method="post" enctype="multipart/form-data">
					Eposta (*): <input type="text" class="input" name="eposta" size="50"/> <br><br>
					Pasahitza (*): <input type="password" class="input" name="password" size="50"/> <br><br>
					Pasahitza errepikatu (*): <input type="password" class="input" name="password2" size="50"/> <br><br>
					Kodea (*): <input type="text" class="input" name="kode" size="50"/> <br><br>
					<input type="submit" name="berrezarri" value="   Berrezarri   "/>
					<input type="reset" name="garbitu" value="     Garbitu     "/>
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

	$email = trim($_POST['eposta']);
	$pass = trim($_POST['password']);
	$pass2 = trim($_POST['password2']);
	$code = trim($_POST['kode']);

	if (isset($email) && isset($pass) && isset($pass2) && isset($code)) {
		
		if ($pass != $pass2) {
			
			echo "Sartutako bi pasahitzak ez dira berdinak, berrikussi itzazu.";

		} else {

			if ($_SESSION['code'] == $code && $_SESSION['email'] == $email) {
				
				include("dbConfig.php");
				$linki= mysqli_connect($zerbitzaria,$erabiltzailea,$gakoa,$db);

				$hash = password_hash($pass, PASSWORD_DEFAULT);

				$sql = "UPDATE users SET gakoa = '$hash' WHERE eposta = '$email' ";

				if(mysqli_query($linki, $sql)){
					echo "Zure pasahitza berrezarri da.";
				} else {
					echo "Errore bat egon da pasahitza berrezartzean";
				}

			} else {
				echo "Sartutako email-a edo kodea ez dira zuzenak."
			}
		}
	}

?>