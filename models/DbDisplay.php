<?php

namespace app\models;

use app\core\DbModel;

/**
 * Class DisplayData
 *
 * @package app\models
 */
abstract class DbDisplay
{
	public static function show(string $table): array
	{
		$sql = "SELECT * FROM $table ORDER BY id DESC";
		$statement = DbModel::prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();

		return $result;
	}

	public static function showSingle(string $table, string $condition): array
	{
		$sql = "SELECT * FROM $table WHERE id=$condition";
		$statement = DbModel::prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();

		return $result;
	}

	public static function showLastArticles(string $table, int $quantity): array
	{
		$sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $quantity";
		$statement = DbModel::prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();

		return $result;
	}
}