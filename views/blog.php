<div class="blog">
    <div class="blog-content">
        <div class="article-items">
<?php

/** @var $model \app\models\Blog */
/** @var $comments \app\models\Comments */
/** @var $display DbDisplay */

use app\models\BlogRender;
use app\models\CommentsRender;
use app\models\DbDisplay;

$articles = $model->showAll();

$render = new BlogRender($articles);

?>
        </div>
    </div>
</div>

<?php
$commentsRender = new CommentsRender($comments);





