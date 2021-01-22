<?php

namespace app\models;

use app\core\DbModel;

/**
 * Class SubscribeForm
 *
 * @package app\models
 */
class HomeForm extends DbModel
{
	const ARTICLES_TABLE = 'articles';

	/**
	 * @var string
	 */
	public string $email = '';


	/**
	 * {@inheritdoc}
	 */
	public function rules(): array
	{
		return [
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]]
			];

	}


	/**
	 * {@inheritdoc}
	 */
	public function labels(): array
	{
		return [
			'email' => 'Email',
		];

	}


	/**
	 * {@inheritdoc}
	 */
	public function send()
	{
		return parent::save();

	}


	/**
	 * {@inheritdoc}
	 */
	public function tableName(): string
	{
		return 'subscribers';

	}


	/**
	 * {@inheritdoc}
	 */
	public function attributes(): array
	{
		return ['email'];

	}


	/**
	 * {@inheritdoc}
	 */
	public function primaryKey(): string
	{
		return 'id';

	}


	/**
	 * This method return last articles from database.
	 *
	 * @param $quant
	 */
	public function lastArticles($quant)
	{
		$lastArticles = DbDisplay::showLastArticles(self::ARTICLES_TABLE , $quant);

		foreach ($lastArticles as $article) {
			$title = $article['title'];
			$time = $article['created_at'];
			$id = $article['id'];

			echo <<< msg
		<p>
			<b><a href="/article?id=$id">$title | [$time] </a></b><br>
		</p>
msg;
		}

	}


}
