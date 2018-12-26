<?php

	session_start();

	if ($_SESSION['user'] != 'ikasle' && $_SESSION['user'] != 'admin') {
		session_unset();
		session_destroy();
		header('Location: layout.php');
		exit();
	}
	

?>