<?php
/** @var $this \app\core\View */

use app\core\Application;

$this->title = 'Profile';
?>

<h1>Hello, <?php echo Application::$app->user->getDisplayName(); ?>!</h1>

