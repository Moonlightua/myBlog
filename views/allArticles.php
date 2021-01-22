<?php


use app\models\Blog;
use app\models\Delete;

$model = new Blog();
$article = $model->showAll();

if (isset($_GET['del']) && is_numeric($_GET['del'])) {
    $id = (int)$_GET['del'];
    Delete::delete($id, get_class($model));
    header("Location: /allArticles");
}

foreach ($article as $item) {
    $title = $item['title'];
    $date = $item['created_at'];
    $time = substr(str_replace('-','.', $date), 0,strlen($date) - 3);
    $text = $item['text'];
    $id = $item['id'];

    echo <<< msg
			<div class="article-title"><a href="/article?id=$id">$title</a> | $time</div>
			
			<div class="article-text">$text</div>
            <p align="right">
                <a href="/allArticles?edit=$id">Edit</a>
		        <a href="/allArticles?del=$id">Delete</a>
	        </p>
<hr>
msg;
}