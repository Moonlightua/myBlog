<?php


namespace app\models;


class BlogRender
{
    public function __construct($articles)
    {
        foreach ($articles as $article) {
            $title = $article['title'];
            $time = $article['created_at'];
            $text = $article['text'];
            $id = $article['id'];
            $image = $article['image'];
            $subtitle = $article['subtitle'];

                echo <<< msg
		<article class="article-item">
msg;
                if ($image != null) {
                    echo <<< msg
            <div class="article-image">
               <img src="../img/$image">
            </div>
msg;
                }
           echo <<< msg
            <div class="article-content">
                <div class="article-title">
                    <a href="/article?id=$id">$id. $title</a>
                </div>
                <div class="article-subtile">
                    <span>$subtitle</span>
                </div>
                <div class="article-footer">
                    <div class="article-created_date">
                        $time
                    </div>
                    <div class="article-read_time">
                        Reading time
                    </div>
                </div>
            </div>
            <hr>
		</article>
		
msg;
        }
    }
}