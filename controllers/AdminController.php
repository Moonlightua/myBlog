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
use app\models\Admin;
use app\models\Blog;
use app\models\DbDisplay;
use app\models\Messages;
use app\models\SiteDesignForm;
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

            if ($_FILES['image']['size'] == 0) {
                Application::$app->session->setFlash('warning', 'Add image!');
                $response->redirect('/addArticle');
                exit;
            }

			$arr = DbDisplay::showLastArticles('articles', 1);
			$id = $arr[0]['id'] + 1;
			$name = substr($_FILES['image']['name'],-4);
			$image_id = $id . $name;
			$image_path = '../public/img/'. $image_id;
			copy($_FILES['image']['tmp_name'], $image_path);

			$article->loadData($request->getBody());
            $article->image = $image_id;
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


    public function allArticles()
    {
        $field = new AddArticleForm();
        $articles = new Blog();
        $params = [
            'model' => $articles,
            'field' => $field
        ];
        $path = $articles->link() ?? '/allArticles';

        $position = strpos($path, '?edit');
        if ($position === false) {
            return $this->render('allArticles', $params);
        } else {
            return $this->render('articlesEdit', $params);

        }

    }

    /**
     * This method return page with site design settings.
     *
     * @return string|string[]
     */
    public function Design(Request $request, Response $response)
    {
        $design = new SiteDesignForm();

        if ($request->isPost()) {
            if ($_FILES['image']['size'] == 0) {
                Application::$app->session->setFlash('warning', 'Add image!');
                $response->redirect('/addArticle');
                exit;
            }

            $name = $_POST['region'];
            if ($name == '/') {
                $name = 'home';
            } elseif (strlen($name) > 1) {
                $name = substr($name, 1);
            }
            $imageType = substr($_FILES['image']['name'],-4);
            $image_id = $name . $imageType;
            $image_path = '../public/img/menu-images/'. $image_id;
            copy($_FILES['image']['tmp_name'], $image_path);

            $design->loadData($request->getBody());
            $design->image = $image_id;
            if ($design->validate() && $design->save()) {
                Application::$app->session->setFlash('success', 'Article successful added!');
                $response->redirect('/Design');
            }
        }

        return $this->render('design', ['model' => $design]);

    }

}
