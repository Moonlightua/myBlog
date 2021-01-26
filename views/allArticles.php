<?php


use app\models\AdminArticleDelete;
use app\models\AdminArticleRender;
use app\models\Blog;

$form = new \app\core\form\Form();
$model = new Blog();
$article = $model->showAll();

if (isset($_GET['del']) && is_numeric($_GET['del'])) {
    $delete = new AdminArticleDelete($_GET['del'], $model);
}

echo $form->renderDiv('article-items_admin');
$render = new AdminArticleRender($article);
$form->endDiv();