<?php
/**
 * Base middleware class.
 */
namespace app\core\middlewares;

/**
 * Class BaseMiddleware
 *
 * @package app\core\middlewares
 */
abstract class BaseMiddleware
{


	/**
	 * Base execute method.
	 *
	 * @return mixed
	 */
	abstract public function execute();


}
