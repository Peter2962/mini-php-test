<?php

namespace Core;

class View
{

	private $viewDir;

	public function __construct(private $file)
	{
		$this->viewDir = getBaseDir('views');
	}

	public function include($file)
	{
		include $this->viewDir . DS . $file;
	}

	public function render($parameters = [])
	{
		// convert parameters array to variables
		extract($parameters, EXTR_PREFIX_SAME, 'wddx');
		$viewDir = getBaseDir('views');

		$viewFile = $viewDir . DS . $this->file;
		if (!file_exists($viewFile)) {
			echo 'View file ' . $this->file . ' does not exist';
			exit;
		}

		include $viewFile;
	}

}