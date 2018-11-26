<?php
		$erab = $_GET['erabiltzailea'];
		$taula = "<tr><th>Email</th><th>Question</th><th>Correct answer</th></tr>";
		
		$xml = simplexml_load_file("../questions.xml");
		foreach ($xml->children() as $question) {
			if (strcmp($erab, $question['author']) == 0){
				
				$text = "<tr>";
				$text .= "<td>" . $question['author'] . "</td>";
				$text .= "<td>" . $question->itemBody->p . "</td>";
				$text .= "<td>" . $question->correctResponse->value . "</td>";
				$text .= "</tr>";
				$taula .= $text;
			}
			
		}

		echo $taula;
				
	?>