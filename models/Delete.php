<?php
/**
 * Delete class.
 */
namespace app\models;

use app\core\DbModel;

/**
 * Class Delete
 *
 * @package app\models
 */
class Delete
{
	const ARTICLE = 'app\models\Blog';
	const EMAIL = 'app\models\SubEmails';
	const MESSAGE = 'app\models\Messages';

	/**
	 * This method delete records from database by id and return true in success, return false if fail.
	 *
	 * @param int $id
	 * @param string $class
	 * @return bool
	 *
	 * @throws \Exception
	 */
	public static function delete(int $id, string $class): bool
	{
		switch($class){
			case self::ARTICLE: $sql = "DELETE FROM articles WHERE id = $id";
				break;
			case self::EMAIL: $sql = "DELETE FROM subscribers WHERE id = $id";
				break;
			case self::MESSAGE: $sql = "DELETE FROM messages WHERE id = $id";
				break;
			default: throw new \Exception('Wrong class!');
		}

		$statement = DbModel::prepare($sql);
		$statement->execute();

		return $statement ? true : false;

	}


}
