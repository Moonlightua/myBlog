<?php
/**
 * This controller works with authorization on the site
 *
 * @file
 */

namespace app\controllers;

use app\core\Application;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

/**
 * Class AuthController
 *
 * @package app\controllers
 */
class AuthController extends Controller
{


	/**
	 * AuthController constructor.
	 */
	public function __construct()
	{
		$this->registerMiddleware(new AuthMiddleware(['profile']));

	}


	/**
	 * This method responsible for logging in the site.
	 *
	 * @param Request $request
	 * @param Response $response
	 *
	 * @return string|string[]|void
	 */
	public function login(Request $request, Response $response)
	{
		$loginForm = new LoginForm();
		if ($request->isPost()) {
			$loginForm->loadData($request->getBody());
			if ($loginForm->validate() && $loginForm->login()) {
				$response->redirect('/');
			}
		}

		$this->setLayout('main');

		return $this->render('login', ['model' => $loginForm]);

	}


	/**
	 * This method responsible for registration on the site.
	 *
	 * @param Request $request
	 *
	 * @return string|string[]
	 */
	public function register(Request $request)
	{
		$user = new User();
		if ($request->isPost()) {
			$user->loadData($request->getBody());

			if ($user->validate() && $user->save()) {
				Application::$app->session->setFlash('success', 'Thanks for registering!');
				Application::$app->response->redirect('/');
			}

			return $this->render('register', ['model' => $user]);
		}

		$this->setLayout('main');

		return $this->render('register', ['model' => $user]);

	}


	/**
	 * This method responsible for logout from the site.
	 *
	 * @param Response $response
	 */
	public function logout(Request $request, Response $response)
	{
		Application::$app->logout();

		$response->redirect('/');

	}


	/**
	 * This method responsible for profile page.
	 *
	 * @return string|string[]
	 */
	public function profile()
	{
		return $this->render('profile');

	}


}
