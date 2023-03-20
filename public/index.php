<?php

$baseDir = realpath(dirname(__DIR__));

define('BASEDIR', $baseDir);
define('DS', DIRECTORY_SEPARATOR);
define('PUBLIC_DIR', BASEDIR . DS . 'public');
define('BOOTSTRAP', BASEDIR . DS . 'bootstrap.php');

if(!file_exists(BOOTSTRAP)) {
	echo 'Unable to load bootstrap file ' . BOOTSTRAP;
	if(function_exists('http_response_code')){
		http_response_code(500);
	}
	
	exit;
}

require(BOOTSTRAP);