<?php

if (!function_exists('getBaseDir')) {
	function getBaseDir($path = '')
	{
		return BASEDIR . DS . $path;
	}
}

if (!function_exists('getRoutesDir')) {
	function getRoutesFile()
	{
		return getBaseDir('routes.php');
	}
}