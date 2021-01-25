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
			<div class="article-title"><a href="/article?id=$id">$id. $title</a> | $time</div>
			<div class="article-subtitle">$subtitle</div>
msg;
            if ($image != null){
            echo <<< msg
			<div class="article-image"><img src="../img/$image"></div>
msg;
}
			echo <<< msg
            <p align="right">
                <a href="/allArticles?edit=$id">Edit</a>
		        <a href="/allArticles?del=$id">Delete</a>
	        </p>
<hr>
msg;
        }
    }

}