<?php
error_reporting(0);
use app\core\form\Form;
use app\core\form\PaginationForm;
use app\models\AdminArticleDelete;
use app\models\AdminArticleRender;
use app\models\ArticlesPerPage;
use app\models\Blog;

const ARTICLES_PER_PAGE = 6;
$form = new Form();
$model = new Blog();

$this->title = 'All Articles';

$delete = new AdminArticleDelete($_GET['del'], $model);

$articles = new ArticlesPerPage();
$renderArticle = $articles->getArticles(ARTICLES_PER_PAGE, $model);

echo $form->renderDiv('article-items_admin');
$render = new AdminArticleRender((array)$renderArticle);
$form->endDiv();

$renderPagination = new PaginationForm($articles->getPage(), $articles->totalPages($model, ARTICLES_PER_PAGE));
