<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='../styles/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../styles/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../styles/smartphone.css' />
	<link rel='stylesheet' type='text/css' href='../styles/tables.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href='php/logIn.php'>Log In</a> </span>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Quizz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='addQuestion5.html'>Add Question (HTML5)</a></span>
		<span><a href='php/showQuestions.php'>Show Questions</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	<!--
		<?php
			/*
			include 'dbConfig.php';

			$connection = new mysqli($server, $user, $pass, $database);

			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}

			$sql= "SELECT * FROM questions";
			$result = $connection->query($sql);

			echo "<table><tr><th>Email</th><th>Question</th><th>Correct answer</th><th>Wrong answer 1</th><th>Wrong answer 2</th><th>Wrong answer 3</th><th>Difficulty</th><th>Theme</th></tr>";
			if ($result->num_rows > 0){
			//data output by rows
			while ($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row['email'] . "</td><td>" . $row['question'] . "</td><td>" . $row['correctans'] . "</td><td>" . $row['wrongans1'] . "</td><td>" . $row['wrongans2'] . "</td><td>" . $row['wrongans3'] . "</td><td>" . $row['difficulty'] . "</td><td>" . $row['theme'] . "</td></tr>";
			}
			echo "</table>";
			} else {
			echo "No questions have been added yet. <br>";
			}

			$connection->close();
			*/
		?>

	-->

	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/IgorMaedre/ws18'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

