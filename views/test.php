<?php

/** @var $display DbDisplay */

use app\models\DbDisplay;

$display = new DbDisplay();
$all = $display->show('articles');



$image = $all[0]['image'];

echo $image;