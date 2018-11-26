<?php

	require_once 'lib/nusoap.php';
	require_once 'lib/class.wsdlcache.php';

	$pw = $_GET['pasahitza'];
	//echo $pw;
	$pathlocal = 'http://localhost/hartutakows18/php/service.php?wsdl';
	//$pathgit = 'http://localhost/hartutakows18/php/service.php?wsdl';
	//$pathwebhost = 'http://localhost/hartutakows18/php/service.php?wsdl';
	
	$client = new nusoap_client($pathlocal, true);
	if (isset($_GET['pasahitza'])){
		$erantzuna = $client->call('checkPW', array('pasahitza'=>$pw, 'kode'=>1010));

		$str = fopen('wsdlpwresponse.txt', 'w+');
		fwrite($str, $erantzuna);
		fclose($str);
		
		echo $erantzuna;
		//echo 'Erantzuna: '.$response.'\n Request: '.htmlspecialchars($client->request, ENT_QUOTES).'\n Response: '.htmlspecialchars($client->response, ENT_QUOTES).'\n Debug: '.htmlspecialchars($client->debug_str, ENT_QUOTES).' \npene';

	}
	
?>