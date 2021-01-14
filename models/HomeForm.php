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

	public string $email = '';

	public function rules(): array
	{
		return [
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]]
			];
	}

	public function labels(): array
	{
		return [
			'email' => 'Email',
		];
	}

	public function send()
	{
		return parent::save();
	}

	public function tableName(): string
	{
		return 'subscribers';
	}

	public function attributes(): array
	{
		return ['email'];
	}

	public function primaryKey(): string
	{
		return 'id';
	}

	public function lastArticles($quant)
	{
		$lastArticles = DbDisplay::showLastArticles(self::ARTICLES_TABLE , $quant);

		foreach ($lastArticles as $article) {
			$title = $article['title'];
			$time = $article['created_at'];
			$id = $article['id'];

			echo <<< msg
		<p>
			<b><a href="/blog?id=$id">$title | [$time] </a></b><br>
		</p>
msg;
		}

	}
}