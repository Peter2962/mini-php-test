<?php

namespace Core;

use Core\Http\{Router};

class App
{

	public function __construct(public $baseDir, private $routesFile) {}

	public function setup()
	{
		$router = new Router($this->baseDir, $this->routesFile);
		include $this->routesFile;
		$router->watch();
	}

}