<?php
/**
 * Input field class.
 */
namespace app\core\form;

use app\core\Model;

/**
 * Class InputField
 *
 * @package app\core\form
 */
class InputField extends BaseField
{
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';

	/**
	 * @var string
	 */
	public string $type;


	/**
	 * InputField constructor.
	 *
	 * @param Model $model
	 * @param $attribute
	 */
	public function __construct(Model $model, $attribute)
	{
		$this->type = self::TYPE_TEXT;
		parent::__construct($model, $attribute);

	}


	/**
	 * This method modify field to password field.
	 *
	 * @return $this
	 */
	public function passwordField()
	{
		$this->type = self::TYPE_PASSWORD;
		return $this;

	}


	/**
	 * This method render input filed for HTML form.
	 *
	 * @return string
	 */
	public function renderInput(): string
	{
		return sprintf('<input type="%s" name="%s" value="%s" class="form-control%s">',
			$this->type,
			$this->attribute,
			$this->model->{$this->attribute},
			$this->model->hasError($this->attribute) ? ' is-invalid': '',
		);

	}


}
