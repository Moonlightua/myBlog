<?php
/**
 * Main application class.
 */
namespace app\core;

use app\controllers\Controller;
use app\models\User;

/**
 * Class Application
 *
 * @package app\core
 */
class Application
{

	/**
	 * @var string
	 */
	public static string $ROOT_DIR;

	/**
	 * @var Application
	 */
	public static Application $app;

	/**
	 * @var View
	 */
	public View $view;

	/**
	 * @var Router
	 */
    public Router $router;

	/**
	 * @var Database
	 */
    public Database $db;

	/**
	 * @var Request
	 */
    public Request $request;

	/**
	 * @var Response
	 */
    public Response $response;

	/**
	 * @var Session
	 */
	public Session $session;

	/**
	 * @var Controller|null
	 */
    public ?Controller $controller = null;

	/**
	 * @var string
	 */
    public string $layout = 'main';

	/**
	 * @var string|mixed|null
	 */
    public ?string $userClass;

	/**
	 * @var DbModel|null
	 */
    public ?DbModel $user;


	/**
	 * Application constructor.
	 *
	 * @param $rootPath
	 * @param array $config
	 */
    public function __construct($rootPath, array $config)
    {
		$this->userClass = $config['userClass'];
    	self::$ROOT_DIR = $rootPath;
    	self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->session = new Session();
		$this->view = new View();
		$this->router = new Router($this->request, $this->response);

		$this->db = new Database($config['db']);

		$primaryValue = $this->session->get('user');
		if ($primaryValue) {
			$primaryKey = $this->userClass::primaryKey();
			$this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
		} else {
			$this->user = null;
		}

    }


	/**
	 * This method check user, if he guest return true, if he authorized - return false.
	 *
	 * @return bool
	 */
	public static function isGuest()
	{
		return !self::$app->user;

	}


	/**
	 * This method check user, if he admin return true, if not - return false.
	 *
	 * @return bool
	 */
	public static function isAdmin()
	{
	   return self::$app->session->get('user') === "9" ? true : false;

	}

	/**
	 * This method execute application.
	 */
	public function run()
	{
		try {
			echo $this->router->resolve();
		} catch(\Exception $e) {
			$this->response->setStatusCode($e->getCode());
			echo $this->view->renderView('_error', [
				'exception' => $e
			]);
		}

	}


	/**
	 * This method return controller.
	 *
	 * @return Controller
	 */
	public function getController(): Controller
	{
		return $this->controller;

	}


	/**
	 * This method set controller.
	 *
	 * @param Controller $controller
	 */
	public function setController(Controller $controller): void
	{
		$this->controller = $controller;

	}


	/**
	 * This method realize login.
	 *
	 * @param DbModel $user
	 * @return bool
	 */
	public function login(DbModel $user)
	{
		$this->user = $user;
		$primaryKey = $user->primaryKey();
		$primaryValue = $user->{$primaryKey};
		$this->session->set('user', $primaryValue);

		return true;

	}


	/**
	 * This method realize logout.
	 */
	public function logout()
	{
		$this->user = null;
		$this->session->remove('user');

	}


}
