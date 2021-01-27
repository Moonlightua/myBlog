<div class="blog">
    <div class="blog-content">
        <div class="article-items_blog">
<?php

/** @var $model \app\models\Blog */
/** @var $comments \app\models\Comments */
/** @var $display DbDisplay */

use app\core\form\PaginationForm;
use app\models\BlogRender;
use app\models\CommentsRender;
use app\models\DbDisplay;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$articlesPerPage = 8;
$offset = ($page - 1) * $articlesPerPage;

$count = $model->articlesCount('articles');
$totalPages = ceil($count[0][0] / $articlesPerPage);

$renderArticle = $model->articlePerPage('articles', $offset, $articlesPerPage);


$render = new BlogRender($renderArticle);

?>
        </div>
    </div>
</div>

<?php

$renderPagination = new PaginationForm($page, $totalPages);


$commentsRender = new CommentsRender($comments);





