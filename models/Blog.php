<?php

namespace app\models;


/**
 * Class BlogForm
 *
 * @package app\models
 */
class Blog extends DbDisplay
{
	const TABLE = 'articles';

	public function showAll(): array
	{
		return parent::show(self::TABLE);
	}

	public function showOne($id): array
	{
		return parent::showSingle(self::TABLE, $id);
	}

	public function link()
	{
		return $_SERVER['REQUEST_URI'];
	}
}