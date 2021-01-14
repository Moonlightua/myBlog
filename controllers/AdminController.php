<?php
/**
 * This controller works with admin panel functions.
 *
 * @file
 */

namespace app\controllers;

use app\core\Application;
use app\core\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\AddArticleForm;
use app\models\Messages;
use app\models\SubEmails;

/**
 * Class for manage function in Admin Panel
 *
 * @package app\controllers
 */
class AdminController extends Controller
{


	/**
	 * AdminController constructor.
	 */
	public function __construct()
	{
		$this->registerMiddleware(new AdminMiddleware(['messages', 'addArticle', 'subEmails']));

	}


	/**
	 * This method add article to the blog.
	 *
	 * @param Request $request
	 * @param Response $response
	 *
	 * @return string|string[]
	 */
	public function addArticle(Request $request, Response $response)
	{
		$article = new AddArticleForm();
		if ($request->isPost()) {
			$article->loadData($request->getBody());
			if ($article->validate() && $article->save()) {
				Application::$app->session->setFlash('success', 'Article successful added!');
				$response->redirect('/addArticle');
			}
		}

		return $this->render('addArticle', ['model' => $article]);

	}


	/**
	 * This method return list of all subscribers emails.
	 *
	 * @return string|string[]
	 */
	public function subEmails()
	{
		$subEmails = new SubEmails();

		return $this->render('subEmails', ['model' => $subEmails]);

	}


	/**
	 * This method return list of all messages.
	 *
	 * @return string|string[]
	 */
	public function messages()
	{
		$messages = new Messages();

		return $this->render('messages', ['model' => $messages]);

	}
}
