<?php

/** @var $model \app\models\SubEmails */

use app\models\Delete;

$articles = $model->showSubList();

if (isset($_GET['del']) && is_numeric($_GET['del'])) {
	$id = (int)$_GET['del'];
	Delete::delete($id, get_class($model));
	header("Location: /subEmails");
}

foreach ($articles as $article) {
	$email = $article['email'];
	$id = $article['id'];
	$time = $article['created_at'];

	echo <<< msg
		<p>
			<b>$id.) $email [$time]</b><br>
		</p>
		<p align="right">
		<a href="/subEmails?del=$id">Delete</a>
	</p>
<hr>
msg;

}