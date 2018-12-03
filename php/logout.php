<?php

	session_start();
	$text = 'Before: ';
	$textaf = 'After: ';
	$text .= print_r($_SESSION);
	echo "<script>console.log(".$text.");</script>";
	session_unset();
	session_destroy();
	$textaf .= print_r($_SESSION);
	$textaf .= 'Valiente mierda';
	echo "<script>console.log(".$textaf.");</script>";
	header("Location: layout.php");

?>