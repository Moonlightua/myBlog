<?php
/**
 * Text area class.
 */
namespace app\core\form;

/**
 * Class TextareaField
 *
 * @package app\core\form
 */
class TextareaField extends BaseField
{


	/**
	 * This method render text area for HTML form.
	 *
	 * @return string
	 */
	public function renderInput(): string
	{
		return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
			$this->attribute,
			$this->model->hasError($this->attribute) ? ' is-invalid': '',
			$this->model->{$this->attribute},
		);

	}


}
