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
			$image = $article['image'];
			$subtitle = $article['subtitle'];


			echo <<< msg
            
                <div class="article-item">
                    <div class="article-image">
                        <img src="../img/$image">
                    </div>
                    <div class="recent-article_content">
                        <div class="article-title_home">
                            <a href="/article?id=$id">$title</a>
                        </div>
                        <div class="article-subtitle">
                            <div class="subtitle">
                                $subtitle
                            </div>
                        </div>
                        <div class="article-footer">
                            <div class="created-time">
                                $time
                            </div>
                        </div>
                    </div>
                </div>
			
		
msg;
		}

	}


}
