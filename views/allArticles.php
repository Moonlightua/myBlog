<?php


use app\models\AdminArticleDelete;
use app\models\AdminArticleRender;
use app\models\Blog;

$model = new Blog();
$article = $model->showAll();

if (isset($_GET['del']) && is_numeric($_GET['del'])) {
    $delete = new AdminArticleDelete($_GET['del'], $model);
}
$render = new AdminArticleRender($article);