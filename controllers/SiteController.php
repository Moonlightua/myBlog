<?php
/**
 * This controller responsible for main pages of the site.
 *
 * @file
 */

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\AboutForm;
use app\models\AddArticleForm;
use app\models\Admin;
use app\models\Blog;
use app\models\Comments;
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


    static array $parametres = [];

	/**
	 * This method responsible for contact page.
	 *
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return string|string[]
	 */
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

		return $this->render('contact', ['model' => $contact]);

	}


	/**
	 * This method responsible for home page.
	 *
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return string|string[]
	 */
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

		$params = ['model' => $sub];

		return $this->render('home', $params);

	}


	/**
	 * This method responsible for about page.
	 *
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return string|string[]
	 */
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

		$params = ['model' => $sub];

		return $this->render('about', $params);

	}


	/**
	 * This method responsible for blog page.
	 *
	 * @return string|string[]
	 */
	public function blog(Request $request, Response $response)
	{
		$blog = new Blog();
		$comments = new Comments();

		$params = ['model' => $blog,
			'comments' => $comments];

		if ($request->isPost()) {
			$comments->loadData($request->getBody());

			if ($comments->validate() && $comments->save()) {
				Application::$app->session->setFlash('success', 'Comment added');
				$link = $_SERVER['REQUEST_URI'];
				Application::$app->response->redirect($link);
			}
		}

			return $this->render('blog', $params);

	}


	/**
	 * This method responsible for admin page.
	 *
	 * @return string|string[]
	 */
	public function admin()
	{
		return $this->render('admin');

	}

	public function test()
	{
		return $this->render('test');

	}

    public function article(Request $request, Response $response)
    {

            $articles = new Blog();

            $params = [
                'model' => $articles,
            ];
            return $this->render("article", $params);
	}

    public function articlePost(Request $request, Response $response)
    {
            $articles = new Blog();
            $article = new AddArticleForm();
            $path = $_SERVER['HTTP_REFERER'];

            $name = Admin::getFileName($path, $_FILES, '?edit=');
            $id = $name['id'];
            $imageName = $name['name'];

            $article->loadData($request->getBody());
            $article->image = $imageName;

            if ($article->edit($id)) {
                Application::$app->session->setFlash('success', 'Article successful edited!');
            $params = [
                'model' => $articles,
                'image' => $imageName,
                'id' => $id
            ];
                $response->redirect("$path");
            }

	}
}
