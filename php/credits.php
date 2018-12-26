<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Credits</title>
    <link rel='stylesheet' type='text/css' href='../styles/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../styles/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='styles/smartphone.css' />
	<script src="../js/jquery-3.2.1.js"></script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class='logeatuGabeak'><a href="logIn.php">LogIn</a> </span>
		<span class='logeatuGabeak'><a href="signUp.php">SignUp</a> </span>
		<span class='logeatuak'><a href="layout.php">LogOut</a> </span>
		<a id="backButton" href=javascript:history.go(-1);> <img src="../images/atrás.png" width="40" height="40"></a>
		<div id="logInfo"></div>
		<h2>Credits</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='<?php if (!empty($_GET['logged'])) {$id = $_GET['logged']; echo "layout.php?logged=$id";} else {echo "layout.php";} ?>'>Home</a></span>
		<span><a href='<?php if (!empty($_GET['logged'])) {$id = $_GET['logged']; echo "layout.php?logged=$id";} else {echo "layout.php";} ?>'>Quizzes</a></span>
		<!--<span class='logeatuak'><a href='<?php if (!empty($_GET['logged'])) {$id = $_GET['logged']; echo "addQuestion.php?logged=$id";} ?>'>Add question</a></span>
		<span class='logeatuak'><a href='<?php if (!empty($_GET['logged'])) {$id = $_GET['logged']; echo "showQuestions.php?logged=$id";} ?>'>Show questions</a></span>
		<span class='logeatuak'><a href='<?php if (!empty($_GET['logged'])) {$id = $_GET['logged']; echo "showXMLQuestions.php?logged=$id";} ?>'>Show XML questions</a></span>-->
		<?php
		if (isset($_SESSION['user'])) {
   			$id=$_GET['logged'];
			if ($_SESSION['user'] == 'admin') {
				echo "<span><a href='handlingAccounts.php?logged=$id'>Manage accounts</a></span>";
			} else if ($_SESSION['user'] == 'ikasle') {
				echo "<span><a href='handlingQuizesAJAX.php?logged=$id'>Show your questions</a></span>";
			}
		}
		?>
		<span><a href='<?php $id=$_GET['logged']; echo "credits.php?logged=$id"; ?>'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
		<div id="Ikaslea1">
			<h2>Ikaslea1</h2> </br>
			<strong>Izen-abizenak:</strong> Iñigo Arnedo </br>
			<strong>Espezielitatea:</strong> Konputazioa </br>
			<strong>Bizilekua:</strong> Agurain </br>
			<strong>Argazkia:</strong> </br>
			<img class="irudiak" src="../images/cred2.png" width="175" height="175">
		</div>
		
		<div id="Ikaslea1">
			<h2>Ikaslea2</h2> </br>
			<strong>Izen-abizenak:</strong> Igor Lekuona </br>
			<strong>Espezielitatea:</strong> Software Ingeniaritza </br>
			<strong>Bizilekua:</strong> Zarautz </br>
			<strong>Argazkia:</strong> </br>
			<img class="irudiak" src="../images/cred1.png" width="175" height="175">
		</div>
    </section>
    Webgune honek Manex Lazkano eta Mikel Oiarbide -ren webgunea du oinarri bezela.
	<footer class='main' id='f1'>
		 <a href='https://github.com/IgorMaedre/'>Link GITHUB</a>
	</footer>
  </div>
</body>
</html>

<?php
	include("userInfo.php");
?>