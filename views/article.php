<?php

/** @var $model \app\models\Blog */

$path = $_SERVER['REQUEST_URI'];
$position = strpos($path, '?');

$id =substr($path, $position + 4, strlen($path));



$article = $model->showOne($id);

foreach ($article as $item) {
	$title = $item['title'];
	$time = $item['created_at'];
	$text = $item['text'];
	$id = $item['id'];

	echo <<< msg
		<p>
			<b>$title | $time</b><br>
			$text
		</p>
msg;

}
