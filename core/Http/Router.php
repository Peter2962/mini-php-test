<?php

namespace Core\Http;

use Exception;

class Router
{

	private static $definedRoutes = [
		'GET' => [],
		'POST' => [],
		'DELETE' => []
	];

	public function __construct(private $baseDir, private $routesFile){}

	private function getDefinedRoutes()
	{
		return self::$definedRoutes;
	}

	public function watch()
	{
		$requestUri = $_SERVER['REQUEST_URI'];
		$accessedRequestMethodString = $_SERVER['REQUEST_METHOD'];
		$getDefinedGroup = self::$definedRoutes[
			$accessedRequestMethodString
		];

		$accessedRequestMethod = match ($accessedRequestMethodString) {
			'GET' => $_GET,
			'POST' => $_POST,
			'DELETE' => $_DELETE,
			default => 'GET',
		};

		$matchedRoute = [];
		$routeMatched = false;

		foreach($getDefinedGroup as $definedRoute) {
			if ($this->routeMatches($definedRoute, $requestUri)) {
				$routeMatched = true;
				$matchedRoute = $definedRoute;
				break;
			}
		}

		if ($routeMatched) {
			return $this->resolveRoute($matchedRoute);
		}

		throw new Exception('No route defined for ' . $requestUri);
	}

	public function get($path, $action, $name)
	{
		$this->define($path, $action, $name, 'GET');
	}

	private function routeMatches($route, $uri)
	{
		$route['path'] = rtrim($route['path']);
		if ($uri == '/' && $route['path'] == $uri) {
			return true;
		}

		if ($route['path'][0] != '/') {
			throw new Exception('Routes must start with a forward slash');
		}

		$segmentDelimiter = '/:';
		$segmentDelimiterPos = strpos($route['path'], $segmentDelimiter);
		$routePathArray = array_filter(explode('/', $route['path']));
		$uriArray = array_filter(explode('/', $uri));

		// If we can't find the segment delimiter, then we have a static route.
		if (!$segmentDelimiterPos) {
			// static route detected
			$routeDiff = array_diff($uriArray, $routePathArray);
			if ($uriArray != $routePathArray) {
				return false;
			}

			return true;
		}

		return false;
	}

	private function resolveRoute($route)
	{
		$controller = $route['action'][0];
		$method = $route['action'][1];

		$controllerClass = 'App\\Controllers\\' . $controller;
		call_user_func([new $controllerClass, $method]);
	}

	private function define($path, $action, $name, $method)
	{
		self::$definedRoutes[$method][] = [
			'path' => $path,
			'name' => $name,
			'action' => $action,
			'method' => $method
		];
	}

}