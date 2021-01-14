<?php

namespace app\controllers;

use app\core\Application;
use app\core\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\AddArticleForm;
use app\models\Messages;
use app\models\SubEmails;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class AdminController extends Controller
{
	public function __construct()
	{
		$this->registerMiddleware(new AdminMiddleware(['messages', 'addArticle', 'subEmails']));
	}

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
		return $this->render('addArticle', [
			'model' => $article
		]);
	}

	public function subEmails()
	{
		$subEmails = new SubEmails();

		return $this->render('subEmails',[
			'model' => $subEmails
		]);
	}

	public function messages()
	{
		$messages = new Messages();

		return $this->render('messages',[
			'model' => $messages
		]);
	}
}