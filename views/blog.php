<div class="blog">
    <div class="blog-content">
        <div class="article-items_blog">
<?php

/** @var $model \app\models\Blog */
/** @var $comments \app\models\Comments */
/** @var $display DbDisplay */

use app\core\form\PaginationForm;
use app\models\ArticlesPerPage;
use app\models\BlogRender;
use app\models\CommentsRender;
use app\models\DbDisplay;

$this->title = 'Blog';

const ARTICLES_PER_PAGE = 4;

$articles = new ArticlesPerPage();
$renderArticle = $articles->getArticles(ARTICLES_PER_PAGE, $model);

$render = new BlogRender($renderArticle);

?>
        </div>
    </div>
</div>

<?php

$renderPagination = new PaginationForm($articles->getPage(), $articles->totalPages($model, ARTICLES_PER_PAGE));

$commentsRender = new CommentsRender($comments);
