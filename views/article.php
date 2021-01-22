<?php

/** @var $model \app\models\Blog */


use app\core\form\Form;
use app\core\form\TextareaField;
use app\models\DbDisplay;

$path = $_SERVER['REQUEST_URI'];
$position = strpos($path, '?');


$id = substr($path, $position + 4, strlen($path));


$allImages = scandir('../public/img/');

foreach ($allImages as $item) {
	$dot = strpos($item, '.');
	$letters = strlen(substr($item, $dot));
	$images[] = substr($item, 0, (strlen($item) - $letters));
}

foreach ($images as $key => $value) {
	if ($value == $id) {
		$imgKey = $key;
	}
}





echo "<div class='article'>";
$article = $model->showOne($id);
echo "<div class='inner-article'>";
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

echo "</div>";


echo "</div>";