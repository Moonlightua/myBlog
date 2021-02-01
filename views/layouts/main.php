<?php
use app\core\Application;
use app\models\DesignModel;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?php /** @var $title \app\core\form\Form */ echo $this->title;?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="css/normalize.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
	<link href="css/new.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/site/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<header>
	<div class="top-menu">
				<div class="logo-text"><a href="/" style="color:black;text-decoration:none;border:none">RELAX, YOU'RE DOING FINE!</a></div>
				<div class="textunderlogo">Life Advice That Doesn't Suck</div>
	</div>

	<div class="head-text" id="menu">
		<a href="/">Home</a>
		<a href="/about">About</a>
		<a href="/blog">Blog</a>
		<a href="/contact">Contact</a>
		<?php if (Application::isGuest()): ?>
		<a href="/login">Login</a>
		<a href="/register">Register</a>
		<?php else: ?>
		<a href="/profile">Profile</a>
		<a class="right" href="/logout">Logout</a>
		<div class="username">
			Welcome, <?php echo Application::$app->user->getDisplayName(); ?>
		</div>
		<?php endif; ?>
		<?php if (Application::isAdmin()): ?>
		<div class="navbar-admin">
			<a class="nav-link" aria-current="page" href="/admin">
				Admin Panel
			</a>
		</div>


		<?php endif; ?>
	</div>
</header>
<body>
 <?php  if (DesignModel::imageExist($_SERVER['REQUEST_URI'])): ?>
     <div class="main-image-menu">
         <div class="menu-image">
             <?php $name = DesignModel::imageName($_SERVER['REQUEST_URI']);
             DesignModel::renderImage($name);
             DesignModel::renderTitle($_SERVER['REQUEST_URI']);
             DesignModel::renderSubtitle($_SERVER['REQUEST_URI']);
             ?>
         </div>
     </div>
 <?php endif; ?>
<div class="main">
	<div class="container">
		<div class="content">
			<?php if (Application::$app->session->getFlash('success')): ?>
			<div class="alert alert-success">
				<?php echo (Application::$app->session->getFlash('success')); ?>
			</div>
			<?php endif; ?>
            <?php if (Application::$app->session->getFlash('warning')): ?>
                <div class="alert alert-warning">
                    <?php echo (Application::$app->session->getFlash('warning')); ?>
                </div>
            <?php endif; ?>
			{{ content }}
		</div>
	</div>
</div>
<footer class="foot">
	<div class="footer block">
		<div class="item">
			<div class="foot-text2">
				<a href="/" style="color:white;text-decoration:none; border:white;">RELAX, YOU'RE DOING FINE!</a>
			</div>
		</div>
		<div class="item">
			<div class="foot-text3">People have difficulties embracing their inner spirituality because everyday stressors get the best of them; finding peace and happiness in the little joys of life can seem difficult, results do not seem all that gratifying.
			</div>
		</div>
		<div style="clear:both"></div>

		<div class="foot-text">
            <div><a class="up" href="#">UP</a></div>
			<hr style="height:0.1px;border-width:0;color:white;background-color:white">
			&copy; 2021 Keep Calm Group , INC. ALL RIGHTS RESERVED
		</div>
	</div>
</footer>
</body>
</html>
