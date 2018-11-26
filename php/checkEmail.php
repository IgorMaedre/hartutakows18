<?php

	require 'lib/nusoap.php';

	$erab = $_GET['erabiltzailea'];
	$client = new nusoap_client('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl');
	$response = $client->call('egiaztatuE', array('name'=>$erab));
	if ($response == 'BAI') {
		$text = $response;
	} else if ($response == 'EZ') {
		$text = $response;
	} else {
		$text = "Ez da erantzunik jaso, erroreren bat izango da.";
	}
	echo $text;

?>