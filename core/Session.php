<?php
/**
 * Main session class.
 */
namespace app\core;

/**
 * Class Session
 *
 * @package app\core
 */
class Session
{
	protected const FLASH_KEY = 'flash_message';


	/**
	 * Session constructor.
	 */
	public function __construct()
	{
		session_start();
		$flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
		foreach ($flashMessages as $key => &$flashMessage) {
			// Mark to be removed
			$flashMessage['remove'] = true;
		}
		$_SESSION[self::FLASH_KEY] = $flashMessages;

	}


	/**
	 * This method set flash message.
	 *
	 * @param $key
	 * @param $message
	 */
	public function setFlash($key, $message)
	{
		$_SESSION[self::FLASH_KEY][$key] = [
			'remove' => false,
			'value' => $message,
		];

	}


	/**
	 * This method return flash message by key.
	 *
	 * @param $key
	 * @return false|mixed
	 */
	public function getFlash($key)
	{
		return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;

	}


	/**
	 * @param $key
	 * @param $value
	 */
	public function set($key, $value)
	{
		$_SESSION[$key] = $value;

	}


	/**
	 * @param $key
	 * @return false|mixed
	 */
	public function get($key)
	{
		return $_SESSION[$key] ?? false;

	}


	/**
	 * This method remove session by key.
	 *
	 * @param $key
	 */
	public function remove($key)
	{
		unset($_SESSION[$key]);

	}


	/**
	 * Session desctructor.
	 */
	public function __destruct()
	{
		$flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
		foreach ($flashMessages as $key => &$flashMessage) {
			// Mark to be removed
			if ($flashMessage['remove']) {
				unset($flashMessages[$key]);
			}
		}

		$_SESSION[self::FLASH_KEY] = $flashMessages;

	}


}
