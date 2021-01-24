<?php

/** @var $model \app\models\Blog */


use app\core\form\Form;
use app\core\form\TextareaField;
use app\models\DbDisplay;

$path = $_SERVER['REQUEST_URI'];
$position = strpos($path, '?');


$id = substr($path, $position + 4, strlen($path));


$allImages = scandir('../public/img/');

foreach ($allImages as $item) {
	$dot = strpos($item, '.');
	$letters = strlen(substr($item, $dot));
	$images[] = substr($item, 0, (strlen($item) - $letters));
}

foreach ($images as $key => $value) {
	if ($value == $id) {
		$imgKey = $key;
	}
}





echo "<div class='article'>";
$article = $model->showOne($id);
echo "<div class='inner-article'>";
foreach ($article as $item) {
	$title = $item['title'];
	$date = $item['created_at'];
	$time = substr(str_replace('-','.', $date), 0,strlen($date) - 3);
	$text = $item['text'];
	$id = $item['id'];
	$image = $item['image'];

if ($image != null) {
    echo <<< msg
			<div class="article-image">
			<img src="../img/$image">
			</div>
msg;
}

	echo <<< msg
			<div class="article-title">$title | $time</div>
			
			<hr>
			<div class="article-text">$text</div>
	
msg;

}
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

echo "</div>";


echo "</div>";