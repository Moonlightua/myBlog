<?php

/** @var $model \app\models\Blog */


use app\models\ArticleRender;

$path = $_SERVER['REQUEST_URI'];
$position = strpos($path, '?');

$id = substr($path, $position + 4, strlen($path));

echo "<div class='article'>";
$article = $model->showOne($id);
echo "<div class='inner-article'>";

$render = new ArticleRender($article);
$title = $render->getArticleTitle($article);
$this->title = $title;


echo "</div>";
echo "</div>";

/*
 * Reading Time logic
 *
$wordPerMinute = 90;
$words = str_word_count($text);
echo "<hr>";
echo "Words total ".$words."<br>";
echo "Word per minute ".$wordPerMinute."<br>";
$num = $words / $wordPerMinute;
$readTime = round($num, 2);
$rTime = round(((($readTime - floor($num)) * 60) / 100) + floor($num), 2, PHP_ROUND_HALF_DOWN);
$readingTime = str_replace('.', ':', $rTime);
if (strlen($readingTime) == 3 ) {
    echo $readingTime."0";
} else {
    echo $readingTime;
}
*/