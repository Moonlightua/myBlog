<?php
/**
 * Main model class.
 * @file
 */
namespace app\core;

/**
 * Class Model
 *
 * @package app\core
 */
abstract class Model
{
	public const RULE_REQUIRED = 'required';
	public const RULE_EMAIL = 'email';
	public const RULE_MIN = 'min';
	public const RULE_MAX = 'max';
	public const RULE_MATCH = 'match';
	public const RULE_UNIQUE = 'unique';

	/**
	 * @var array
	 */
	public array $errors = [];

	/**
	 * This method load data form rendered form.
	 *
	 * @param $data
	 */
	public function loadData($data)
	{
		foreach ($data as $key=>$value) {
			if (property_exists($this, $key)) {
				$this->{$key} = $value;
			}
		}

	}


	/**
	 * This method return array of rules.
	 *
	 * @return array
	 */
	abstract function rules(): array;


	/**
	 * This method validata data form input form and return errors if they exist.
	 *
	 * @return bool
	 */
	public function validate()
	{
		foreach ($this->rules() as $attribute => $rules) {
			$value = $this->{$attribute};
			foreach ($rules as $rule) {
				$ruleName = $rule;
				if (!is_string($ruleName)) {
					$ruleName = $rule[0];
				}
				if ($ruleName === self::RULE_REQUIRED && !$value) {
					$this->addErrorForRule($attribute, self::RULE_REQUIRED);
				}
				if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
					$this->addErrorForRule($attribute, self::RULE_EMAIL);
				}
				if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
					$this->addErrorForRule($attribute, self::RULE_MIN, $rule);
				}
				if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
					$this->addErrorForRule($attribute, self::RULE_MAX, $rule);
				}
				if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
					$rule['match'] = $this->getLabel($rule['match']);
					$this->addErrorForRule($attribute, self::RULE_MATCH, ['match' => $this->getLabel($rule['match'])]);
				}
				if ($ruleName === self::RULE_UNIQUE) {
					$className = $rule['class'];
					$uniqueAttr = $rule['attribute'] ?? $attribute;
					$tableName = $className::tableName();
					$statement = Application::$app->db->prepare("SELECT * FROM $tableName 
						WHERE $uniqueAttr = :attr");
					$statement->bindValue(":attr", $value);
					$statement->execute();
					$record = $statement->fetchObject();

					if ($record) {
						$this->addErrorForRule($attribute, self::RULE_UNIQUE, ['field' => $this->getLabel($attribute)]);
					}
				}
			}
		}

		return empty($this->errors);

	}


	/**
	 * THis method add error for rule.
	 *
	 * @param string $attribute
	 * @param string $rule
	 * @param array $params
	 */
	private function addErrorForRule(string $attribute, string $rule, $params = [])
	{
		$message = $this->errorMessages()[$rule] ?? '';
		foreach ($params as $key => $value) {
			$message = str_replace("{{$key}}", $value, $message);
		}
		$this->errors[$attribute][] = $message;

	}


	/**
	 * This method add error.
	 *
	 * @param string $attribute
	 * @param string $message
	 */
	public function addError(string $attribute, string $message)
	{
		$this->errors[$attribute][] = $message;

	}


	/**
	 * This method return error message.
	 *
	 * @return string[]
	 */
	public function errorMessages()
	{
		return [
			self::RULE_REQUIRED => 'This field is required',
			self::RULE_EMAIL => 'This field must be valid email address',
			self::RULE_MIN => 'Min length of this field must be {min}',
			self::RULE_MAX => 'Min length of this field must be {max}',
			self::RULE_MATCH => 'This field must be the same as {match}',
			self::RULE_UNIQUE => 'This {field} already used',
		];

	}

	/**
	 * This method check if attribute has an error.
	 *
	 * @param $attribute
	 * @return false|mixed
	 */
	public function hasError($attribute)
	{
		return $this->errors[$attribute] ?? false;

	}


	/**
	 * This method return label for HTML input.
	 *
	 * @return array
	 */
	public function labels(): array
	{
		return [];

	}


	/**
	 * This method get the label.
	 *
	 * @param $attribute
	 * @return mixed
	 */
	public function getLabel($attribute)
	{
		return $this->labels()[$attribute] ?? $attribute;

	}


	/**
	 * This method get first error.
	 *
	 * @param $attribute
	 * @return false|mixed
	 */
	public function getFirstError($attribute)
	{
		return $this->errors[$attribute][0] ?? false;

	}


}
