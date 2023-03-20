<?php

use Core\View;

if (!function_exists('getBaseDir')) {
	function getBaseDir($path = '')
	{
		return BASEDIR . DS . $path;
	}
}

if (!function_exists('getRoutesFile')) {
	function getRoutesFile()
	{
		return getBaseDir('routes.php');
	}
}

if (!function_exists('render')) {
	function render($view, $params = [])
	{
		$view = new View($view);
		return $view->render($params);
	}
}

if (!function_exists('getConfigDir')) {
	function getConfigDir($path = '')
	{
		return getBaseDir('config') . DS . $path;
	}
}

if (!function_exists('config')) {
	function config($fileAndOption)
	{
		$fileAndOption = explode('.', $fileAndOption);
		if (count($fileAndOption) > 2) {
			throw new Exception('Invalid config parameter');
		}

		$configFile = getConfigDir($fileAndOption[0]) . '.php';
		if (!file_exists($configFile)) {
			throw new Exception('Config file ' . $configFile . ' does not exist');
		}

		$config = include $configFile;
		if (isset($fileAndOption[1])) {
			if (isset($config[$fileAndOption[1]])) {
				return $config[$fileAndOption[1]];
			}

			throw new Exception('Invalid config parameter: ' . $fileAndOption[1]);
		}

		return $config;
	}
}