<?php
/**
 * Admin middleware class.
 * @file
 */
namespace app\core\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @package app\core\middlewares
 */
class AdminMiddleware extends BaseMiddleware
{

	/**
	 * @var array
	 */
	public array $actions = [];


	/**
	 * AdminMiddleware constructor.
	 *
	 * @param array $actions
	 */
	public function __construct(array $actions = [])
	{
		$this->actions = $actions;

	}


	/**
	 * This method implement middleware service for admin.
	 *
	 * @throws ForbiddenException
	 */
	public function execute()
	{
		if (!Application::isAdmin()) {
			if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
				throw new ForbiddenException();
			}
		}

	}


}
