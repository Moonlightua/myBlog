<?php

namespace app\models;

use app\core\DbModel;

class Delete
{
	const ARTICLE = 'App\ArticlesCenter';
	const EMAIL = 'app\models\SubEmails';
	const MESSAGE = 'app\models\Messages';

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