<?php


namespace app\models;


class ArticleRender
{

    public function __construct(array $article)
    {
        foreach ($article as $item) {

            $text = $item['text'];

            echo <<< msg
			<div class="article-text">$text</div>
	
msg;
        }


    }

    public function getArticleTitle(array $article)
    {
        foreach ($article as $item) {
            $title = $item['title'];
        }

        return $title;
    }

}