<?php
/**
 * Form render class.
 */
namespace app\core\form;

use app\core\Model;

/**
 * Class Form
 *
 * @package app\core\form
 */
class Form
{


	/**
	 * This method begin HTML form.
	 *
	 * @param $action
	 * @param $method
	 *
	 * @return Form
	 */
	public static function begin($action, $method)
	{
		echo sprintf('<form action="%s" method="%s">', $action, $method);
		return new Form();

	}


	/**
	 * This method end HTML form.
	 */
	public static function end()
	{
		echo '</form>';

	}


	/**
	 * This method render field.
	 *
	 * @param Model $model
	 * @param $attribute
	 *
	 * @return InputField
	 */
	public function field(Model $model, $attribute)
	{
		return new InputField($model, $attribute);

	}


}
