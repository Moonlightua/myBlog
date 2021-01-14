<?php

namespace app\controllers;

use app\core\Application;
use app\core\middlewares\BaseMiddleware;

/**
 * Class Controller
 *
 * @package app\controllers
 */
class Controller
{
	/**
	 * @var BaseMiddleware[]
	 */
	protected array $middlewares = [];

	public string $action = '';
	public string $layout = 'main';
	public function setLayout($layout)
	{
		$this->layout = $layout;
	}
	
	public function render($view, array $params = [])
	{
		return Application::$app->view->renderView($view, $params);
	}

	public function registerMiddleware(BaseMiddleware $middleware)
	{
		$this->middlewares[] = $middleware;
	}

	public function getMiddlewares(): array
	{
		return $this->middlewares;
	}

}