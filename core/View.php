<?php
/**
 * Main view class.
 */
namespace app\core;

/**
 * Class View
 *
 * @package app\core
 */
class View
{

	/**
	 * @var string
	 */
	public string $title = '';


	/**
	 * This method rendering view for different pages.
	 *
	 * @param string $view
	 * @param array $params
	 *
	 * @return string|string[]
	 */
	public function renderView(string $view, array $params = [])
	{
		$viewContent = $this->renderOnlyView($view, $params);
		$layoutContent = $this->layoutContent();

		return str_replace('{{ content }}', $viewContent, $layoutContent);

	}


	/**
	 * This method include layout.
	 *
	 * @return false|string
	 */
	protected function layoutContent()
	{
		$layout = Application::$app->layout;
		if (Application::$app->controller) {
			$layout = Application::$app->controller->layout;
		}
		ob_start();
		include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";

		return ob_get_clean();

	}


	/**
	 * This method render only view.
	 *
	 * @param $view
	 * @param $params
	 *
	 * @return false|string
	 */
	protected function renderOnlyView($view, $params)
	{
		foreach ($params as $key => $value){
			$$key = $value;
		}
		ob_start();
		include_once Application::$ROOT_DIR . "/views/$view.php";

		return ob_get_clean();

	}


}
