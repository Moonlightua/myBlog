<?php

use app\controllers\AdminController;
use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
	'userClass' => app\models\User::class,
	'db' => [
		'dsn' => $_ENV['DB_DSN'],
		'user' => $_ENV['DB_USER'],
		'password' => $_ENV['DB_PASSWORD']
	],
];

$app = new Application(dirname(__DIR__), $config);

/** Main Routes */
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/about', [SiteController::class, 'about']);
$app->router->get('/blog', [SiteController::class, 'blog']);
$app->router->get('/admin', [SiteController::class, 'admin']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->get('/contact',[SiteController::class, 'contact']);
$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/article', [SiteController::class, 'article']);

/** TEST */
$app->router->get('/test', [SiteController::class, 'test']);

/** Request routes */
$app->router->post('/', [SiteController::class, 'home']);
$app->router->post('/about', [SiteController::class, 'about']);
$app->router->post('/contact', [SiteController::class, 'contact']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->post('/blog', [SiteController::class, 'blog']);
$app->router->post('/article', [SiteController::class, 'article']);
$app->router->post('/articlePost', [SiteController::class, 'articlePost']);

/** Admin Routes */
$app->router->get('/addArticle', [AdminController::class, 'addArticle']);
$app->router->post('/addArticle', [AdminController::class, 'addArticle']);
$app->router->get('/subEmails', [AdminController::class, 'subEmails']);
$app->router->get('/messages', [AdminController::class, 'messages']);
$app->router->get('/allArticles', [AdminController::class, 'allArticles']);

$app->run();

