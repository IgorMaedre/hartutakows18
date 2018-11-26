<?php

	require 'lib/nusoap.php';

	$erab = $_GET['erabiltzailea'];
	$client = new nusoap_client('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl');
	$response = $client->call('egiaztatuE', array('name'=>$erab));
	$text = $response;


	$str = fopen('wsdlemailresponse.txt', 'w+');
	fwrite($str, $text);
	fclose($str);

	echo $text;

?>