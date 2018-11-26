<?php

	require_once ('lib/nusoap.php');
	require_once ('lib/class.wsdlcache.php');

	$pathlocal = 'http://localhost/hartutakows18/php/service.php?wsdl';
	//$pathgit = 'http://localhost/hartutakows18/php/service.php?wsdl';
	//$pathwebhost = 'http://localhost/hartutakows18/php/service.php?wsdl';

	$server = new soap_server;
	$ns = $pathlocal;
	$server->configureWSDL('checkPW', $ns);
	$server->wsdl->schemaTargetNamespace = $ns;

	$server->register('checkPW', array('pasahitza'=>'xsd:string', 'kode'=>'xsd:integer'), array('return'=>'xsd:string'), $ns);

	function checkPW($pasahitza, $kode) {
		if ($kode == 1010) {
			$filename = 'toppasswords.txt';

			// escape special characters in the query
			$pattern = preg_quote($pasahitza, '/');
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
		} else {
			return ('ZERBITZURIK GABE');
		}
		
	}

	if (!isset($HTTP_RAW_POST_DATA)) {
		$HTTP_RAW_POST_DATA = file_get_contents('php://input');
	}
	$server->service($HTTP_RAW_POST_DATA);

?>