<div class="blog">
<?php

/** @var $model \app\models\Blog */


$articles = $model->showAll();


foreach ($articles as $article) {
	$title = $article['title'];
	$time = $article['created_at'];
	$text = $article['text'];
	$id = $article['id'];

	echo <<< msg
		<p>
			<b><a href="/blog?id=$id">$title | [$time] </a></b><br>
		</p>
		<hr>
msg;

}
?>

</div>
