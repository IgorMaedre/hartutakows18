<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
  </head>
</html>
<?php 
	
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "quizz";

	$connection = new mysqli($server, $user, $pass, $database);

	$email = $_POST["eposta"];
	$quest = $_POST["galdera"];
	$corr = $_POST["ezuz"];
	$wro1 = $_POST["eok1"];
	$wro2 = $_POST["eok2"];
	$wro3 = $_POST["eok3"];
	$diff = $_POST["zail"];
	$theme = $_POST["gaia"];

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	$sql= "INSERT INTO questions (email, question, correctans, wrongans1, wrongans2, wrongans3, difficulty, theme) VALUES ( '$email', '$quest', '$corr', '$wro1', '$wro2', '$wro3', '$diff', '$theme')";

	if ($connection->query($sql) === TRUE) {
    	echo "New record created successfully <br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $connection->error;
	}

	$connection->close();

	echo "Itzuli hasierako orrira: <a href='../layout.html'>Layout</a> <br> Egin galdera berri bat: <a href='../addQuestion5.html'>AddQuestion5</a>";
?>