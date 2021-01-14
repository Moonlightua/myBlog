<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\AboutForm;
use app\models\Blog;
use app\models\ContactForm;
use app\models\HomeForm;
use app\models\User;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends Controller
{
	public function contact(Request $request, Response $response)
	{
		$contact = new ContactForm();
		if ($request->isPost()) {
			$contact->loadData($request->getBody());
			if ($contact->validate() && $contact->send()) {
				Application::$app->session->setFlash('success', 'Thanks for contacting us!');
				$response->redirect('/contact');
			}
		}
		return $this->render('contact', [
			'model' => $contact
		]);
	}

	public function home(Request $request, Response $response)
	{
		$sub = new HomeForm();

		if ($request->isPost()) {
			$sub->loadData($request->getBody());
			if ($sub->validate() && $sub->send()) {
				Application::$app->session->setFlash('success', 'Thank you for subscribe!');
				$response->redirect('/');
			}
		}

		$lastArticles = new Blog();

		$params = [
			'model' => $sub
		];
		return $this->render('home', $params);
	}

	public function about(Request $request, Response $response)
	{
		$sub = new AboutForm();

		if ($request->isPost()) {
			$sub->loadData($request->getBody());
			if ($sub->validate() && $sub->send()) {
				Application::$app->session->setFlash('success', 'Thank you for subscribe!');
				$response->redirect('/about');
			}
		}

		$lastArticles = new Blog();

		$params = [
			'model' => $sub
		];

		return $this->render('about', $params);
	}

	public function blog()
	{
		$blog = new Blog();

		$params = [
			'model' => $blog
		];

		$path = $blog->link() ?? '/blog';
		$position = strpos($path, '?');
		if ($position === false) {
			return $this->render('blog', $params);
		} else {
			return $this->render('article', $params);
		}
	}

	public function admin()
	{
		return $this->render('admin');
	}
}