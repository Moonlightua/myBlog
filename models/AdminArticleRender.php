<?php


namespace app\models;


class AdminArticleRender
{

    public function __construct(array $article)
    {

        foreach ($article as $item) {
            $title = $item['title'];
            $date = $item['created_at'];
            $time = substr(str_replace('-','.', $date), 0,strlen($date) - 3);
            $text = $item['text'];
            $id = $item['id'];
            $subtitle = $item['subtitle'];
            $image = $item['image'];

            echo <<< msg
            <div class="article-item_admin">
msg;
            if ($image != null){
                echo <<< msg
			<div class="article-image"><img src="../img/$image"></div>
msg;
            }
            echo <<< msg
            <div class="article-content_admin">
                <div class="article-title_admin">
                    <a href="/article?id=$id">$id. $title</a>
                </div>
                <div class="article-subtitle">$subtitle</div>
                <div class="article-time">$time</div>
			</div>
            <div class="right-menu_admin">
                <a href="/allArticles?edit=$id">Edit</a>
		        <a href="/allArticles?del=$id">Delete</a>
		        <hr>
	        </div>
            </div>
msg;
        }
    }

}