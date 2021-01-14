<?php
/**
 * Basic controller class.
 *
 * @file
 */

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

	/**
	 * @var string
	 */
	public string $action = '';

	/**
	 * @var string
	 */
	public string $layout = 'main';


	/**
	 * This method setting a layout for render.
	 *
	 * @param string $layout
	 */
	public function setLayout(string $layout)
	{
		$this->layout = $layout;

	}


	/**
	 * This method responsible for rendering pages.
	 *
	 * @param string $view
	 * @param array  $params
	 *
	 * @return string|string[]
	 */
	public function render(string $view, array $params=[])
	{
		return Application::$app->view->renderView($view, $params);

	}


	/**
	 * This method for registering of middleware routes.
	 *
	 * @param BaseMiddleware $middleware
	 */
	public function registerMiddleware(BaseMiddleware $middleware)
	{
		$this->middlewares[] = $middleware;

	}


	/**
	 * This method returns all middlewares.
	 *
	 * @return BaseMiddleware[]
	 */
	public function getMiddlewares(): array
	{
		return $this->middlewares;

	}


}
