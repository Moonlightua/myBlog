<?php
/**
 * Request class.
 * @file
 */
namespace app\core;

/**
 * Class Request
 *
 * @package app\core
 */
class Request
{

	/**
	 * This method return path for routing.
	 *
	 * @return false|mixed|string
	 */
	public function getPath()
	{
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
        	return $path;
		}

        return substr($path, 0, $position);

	}


	/**
	 * This method return request method.
	 *
	 * @return string
	 */
    public function method(): string
	{
		return strtolower($_SERVER['REQUEST_METHOD']);

	}

	/**
	 * This method check request method, if it's get - return true, if not - false.
	 *
	 * @return string
	 */
	public function isGet(): string
	{
		return $this->method() === 'get';

	}


	/**
	 * This method check request method, if it's post - return true, if not - false.
	 *
	 * @return string
	 */
	public function isPost(): string
	{
		return $this->method() === 'post';

	}


	/**
	 * This method return all data.
	 *
	 * @return array
	 */
	public function getBody()
	{
		$body = [];
		if ($this->method() === 'get') {
			foreach ($_GET as $key => $value) {
				$body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
			}
		}
		if ($this->method() === 'post') {
			foreach ($_POST as $key => $value) {

				$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
			}
			foreach ($_FILES as $key => $value) {
				$body[$key] = $value['name'];
			}

		}

		return $body;

	}


}
