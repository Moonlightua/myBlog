<?php
/**
 * Custon exception class.
 * @file
 */
namespace app\core\exception;

/**
 * Class ForbiddenException
 *
 * @package app\core\exception
 */
class ForbiddenException extends \Exception
{

	/**
	 * @var string
	 */
	protected $message = 'You don\'t have permission to access this page';

	/**
	 * @var integer
	 */
	protected $code = 403;

}
