<?php session_start();?>
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
				<form action="aldatuPasahitza.php" method="post" enctype="multipart/form-data">
					Eposta (*): <input type="text" class="input" name="eposta" size="50"/> <br><br>
					
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

	if(isset($_POST['eposta'])){

		$email = $_POST['eposta'];
		include("dbConfig.php");
		$linki=  new mysqli($zerbitzaria,$erabiltzailea,$gakoa,$db);

		$sql = "SELECT * FROM users WHERE eposta = '$email'";
		$result = $linki->query($sql);

		if ($result) {
			$row = $result->fetch_assoc();
		}

		if ($row['eposta'] == $email) {
			
			
			//DESTINATION EMAIL
			$to = $email;

			//MESSAGE TOPIC
			$subject = "Pasahitza berrezarri";

			//RANDOM CODE
			$code = rand(10000, 99999);

			//SESSION VARIABLES
			$_SESSION['code'] = $code;
			$_SESSION['email'] = $email;
			//echo '<script>alert("Kodea: '.$code.'");</script>';

			//MESSAGE BODY
			$message = "
			<html>
			<head>
			<title>Pasahitza berrezarri</title>
			</head>
			<body>
			<h3> Pasahitza berrezarri ahal izateko jarraitu beharreko pausuak </h3>
			<ol>
				<li>Sartu emandako link-ean. </li>
				<li>Idatzi eman zaizun kodea eta pasahitz berria. </li>
				<li>Dena ondo baldin badoa zure pasahitza aldatu denaren jakinarazpena jasoko duzu. </li>
			</ol>
			<h3> Berrezartze orrialderako link-a: </h3>
			<h2><a href='https:// -------- /passwordResetCode.php?email=".$email." id='layout'> Hemen clickatu </a></h2>
			<h3> Berreskurapen kodea: </h3>
			<h2> ".$code." <h2>
			</body>
			</html>
			";

			//HTML EMAIL CONTENT TYPE DEFINITION
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			//MAIL FUNCTION TO SEND THE EMAIL
			if (mail($to, $subject, $message, $headers)) {
				echo '<script>alert("Email-a ondo bidali da. Gogora ezazu zure Spam karpeta begiratzea, baliteke hor agertzea zure berreskurapen email-a.");</script>';
			} else {
				echo '<script>alert("Ezin izan da emaila bidali.");</script>';
			}
			
			/* @@@@@@@@ PHPMAILER ERABILERAREN SAIAKERA @@@@@@@@
			require 'PHPMailer/PHPMailer.php';
			require 'PHPMailer/SMTP.php';
			require 'PHPMailer/Exception.php';

			$mail = new PHPMailer();
			if (!$mail) echo '<script>alert("Ez da mail objektua sortu.");</script>';
			//Configuracion PHPMailer
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = $EMAIL_USERNAME;
			$mail->Password = $EMAIL_PASSWORD;

			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			//Configuracion del correo a enviar
			$mail->setFrom($EMAIL_USERNAME);		//REMITENTE
			$mail->addAddress($email);				//DESTINATARIO
			$mail->Subject = 'Pasahitza berrezarri';
			$mail->Body = " <html>
							<head>
							<title>Pasahitza berrezarri</title>
							</head>
							<body>
							<h3> Pasahitza berrezarri ahal izateko jarraitu beharreko pausuak </h3>
							<ol>
								<li>Sartu emandako link-ean. </li>
								<li>Idatzi eman zaizun kodea eta pasahitz berria. </li>
								<li>Dena ondo baldin badoa zure pasahitza aldatu denaren jakinarazpena jasoko duzu. </li>
							</ol>
							<h3> Berrezartze orrialderako link-a: </h3>
							<h2><a href='https://ws18il800505.000webhostapp.com/ws18/php/passwordResetCode.php?email=".$email." id='layout'> Hemen clickatu </a></h2>
							<h3> Berreskurapen kodea: </h3>
							<h2> ".$code." <h2>
							</body>
							</html>
							";
							
			//Envio de email
			if ($mail->send()) {
				echo '<script>alert("Email-a ondo bidali da. Gogora ezazu zure Spam karpeta begiratzea, baliteke hor agertzea zure berreskurapen email-a.");</script>';
			} else {
				echo '<script>alert("Ezin izan da emaila bidali.");</script>';
			}*/
		} else {
			echo "Emandako email-a ez da datubasean existitzen.";
		}
	} else {
		echo "Bete itzazu beharrezko atalak.";
	}

?>