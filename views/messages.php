<?php

/** @var $model \app\models\Messages */

use app\models\AdminArticleDelete;
use app\models\MessagesRender;


$messages = $model->showAllMessages();


if (isset($_GET['del']) && is_numeric($_GET['del'])) {
    $delete = new AdminArticleDelete($_GET['del'], $model);
}

$render = new MessagesRender($messages);
