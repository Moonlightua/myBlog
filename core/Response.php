<?php
/**
 * Main response class.
 * @file
 */
namespace app\core;

/**
 * Class Response
 *
 * @package app\core
 */
class Response
{


	/**
	 * This method set status code.
	 *
	 * @param int $code
	 */
	public function setStatusCode(int $code)
	{
		http_response_code($code);
	}


	/**
	 * This method realize redirectin.
	 *
	 * @param string $url
	 */
	public function redirect(string $url)
	{
		header("Location:" . $url);
	}


}
