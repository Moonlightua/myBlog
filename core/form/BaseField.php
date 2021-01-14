<?php
/**
 * Base field rendering class.
 */
namespace app\core\form;

use app\core\Model;

/**
 * Class BaseField
 *
 * @package app\core\form
 */
abstract class BaseField
{

	/**
	 * @var Model
	 */
	public Model $model;

	/**
	 * @var string
	 */
	public string $attribute;


	/**
	 * BaseField constructor.
	 *
	 * @param Model $model
	 * @param $attribute
	 */
	public function __construct(Model $model, $attribute)
	{
		$this->model = $model;
		$this->attribute = $attribute;

	}


	/**
	 * This method render input form.
	 *
	 * @return string
	 */
	abstract public function renderInput(): string;


	/**
	 * @return string
	 */
	public function __toString()
	{
		return sprintf('
			<div class="mb-3">
					<label>%s</label>
					%s
					<div class="invalid-feedback">
						%s
					</div>
			</div>
		',
			$this->model->getLabel($this->attribute),
			$this->renderInput(),
			$this->model->getFirstError($this->attribute),

		);

	}


}
