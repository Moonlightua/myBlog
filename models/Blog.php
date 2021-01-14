<?php
/**
 * Blog class.
 */
namespace app\models;


/**
 * Class BlogForm
 *
 * @package app\models
 */
class Blog extends DbDisplay
{
	const TABLE = 'articles';


	/**
	 * This method show list of all articles.
	 *
	 * @return array
	 */
	public function showAll(): array
	{
		return parent::show(self::TABLE);

	}


	/**
	 * This method return only one article by id.
	 *
	 * @param $id
	 * @return array
	 */
	public function showOne($id): array
	{
		return parent::showSingle(self::TABLE, $id);

	}


	/**
	 * This method return link for article,
	 *
	 * @return mixed
	 */
	public function link()
	{
		return $_SERVER['REQUEST_URI'];

	}


}
