<?php
use app\core\Application;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="css/normalize.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
	<link href="css/new.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
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
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
					Welcome, <?php echo Application::$app->user->getDisplayName(); ?>
				<a class="nav-link" aria-current="page" href="/logout">
					Logout
				</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" aria-current="page" href="/profile">
					Profile
				</a>
			</li>
		</ul>
		<?php endif; ?>
		<?php if (Application::isAdmin()): ?>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" aria-current="page" href="/admin">
					Admin Panel
				</a>
			</li>
		</ul>
		<?php endif; ?>
	</div>
</header>
<body>
<div class="main">
	<div class="container">
		<div class="content">
			<?php if (Application::$app->session->getFlash('success')): ?>
			<div class="alert alert-success">
				<?php echo (Application::$app->session->getFlash('success')); ?>
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
			<hr style="height:0.1px;border-width:0;color:white;background-color:white">
			&copy; 2021 Keep Calm Group , INC. ALL RIGHTS RESERVED
		</div>
	</div>
</footer>
</body>
</html>
