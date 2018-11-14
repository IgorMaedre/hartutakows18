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

	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	$sql= "SELECT * FROM questions";
	$result = $connection->query($sql);

	if ($result->num_rows > 0){
		//data output by rows
		while ($row = $result->fetch_assoc()) {
			echo "";
		}
	}


?>