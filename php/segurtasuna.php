<?php

	session_start();

	if ($_SESSION['user'] != 'ikasle' && $_SESSION['user'] != 'admin') {
		header('Location: layout.php');
		exit();
	}
	

?>