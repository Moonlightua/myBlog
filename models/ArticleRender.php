<?php


namespace app\models;


class ArticleRender
{

    public function __construct(array $article)
    {
        foreach ($article as $item) {
            $title = $item['title'];
            $date = $item['created_at'];
            $time = substr(str_replace('-','.', $date), 0,strlen($date) - 3);
            $text = $item['text'];
            $id = $item['id'];
            $image = $item['image'];

            if ($image != null) {
                echo <<< msg
			<div class="article-image">
			<img src="../img/$image">
			</div>
msg;
            }
            echo <<< msg
			<div class="article-title">$title | $time</div>
			
			<hr>
			<div class="article-text">$text</div>
	
msg;
        }


    }

}