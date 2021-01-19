<?php

/** @var $model \app\models\Blog */


use app\core\form\Form;
use app\core\form\TextareaField;
use app\models\DbDisplay;

$path = $_SERVER['REQUEST_URI'];
$position = strpos($path, '?');

$id = substr($path, $position + 4, strlen($path));


echo "<div class='article'>";
$article = $model->showOne($id);

foreach ($article as $item) {
	$title = $item['title'];
	$date = $item['created_at'];
	$time = substr(str_replace('-','.', $date), 0,strlen($date) - 3);
	$text = $item['text'];
	$id = $item['id'];

	echo <<< msg
		<p>
			<b>$title | $time</b><br>
			<hr>
			$text
		</p>
msg;

}




echo "</div>";