<?php

/** @var $model \app\models\Messages */

use app\models\Delete;

$articles = $model->showAllMessages();


if (isset($_GET['del']) && is_numeric($_GET['del'])) {
	$id = (int)$_GET['del'];
	Delete::delete($id, get_class($model));
	header("Location: /messages");
}

foreach ($articles as $article) {
	$email = $article['email'];
	$id = $article['id'];
	$time = $article['created_at'];
	$subject = $article['subject'];
	$text = $article['body'];

	echo <<< msg
		<p>
			<b>$id.) $email [$time]</b><br>
			<b>$subject</b><br>
			$text
		</p>
		<p align="right">
		<a href="/messages?del=$id">Delete</a>
	</p>
<hr>
msg;
}

/*

*/