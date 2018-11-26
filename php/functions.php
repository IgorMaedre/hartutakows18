<?php
	require('toppaswords.txt');

	function checkPW($pw) {
		$filename = 'toppasswords.txt';
		$searchfor = $pw;

		// escape special characters in the query
		$pattern = preg_quote($searchfor, '/');
		// finalise the regular expression, matching the whole line
		$pattern = "/^.*$pattern.*\$/m";

		$find = 0;
		$file_lines = file($filename);
		foreach ($file_lines as $line) {
			if (preg_match($pattern, $line)) {
				$find = 1;
				break;
			}
		}
		if ($find) {
			$text = 'BALIOGABEA';
		} else {
			$text = 'BALIODUNA';
		}

		return $text;
	}

?>