<?php
/**
 * Custon exception class.
 */
namespace app\core\exception;

/**
 * Class NotFoundException
 *
 * @package app\core\exception
 */
class NotFoundException extends \Exception
{

	/**
	 * @var integer
	 */
	protected $code = 404;

	/**
	 * @var string
	 */
	protected $message = 'Page not found';

}