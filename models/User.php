<?php
/**
 * User class.
 */
namespace app\models;

use app\core\DbModel;
use app\core\Model;
use app\core\UserModel;

/**
 * Class User
 *
 * @package app\models
 */
class User extends UserModel
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	const STATUS_DELETED = -1;

	/**
	 * @var string
	 */
	public string $firstname = '';

	/**
	 * @var string
	 */
	public string $lastname = '';

	/**
	 * @var string
	 */
	public string $email = '';

	/**
	 * @var int
	 */
	public int $status = self::STATUS_INACTIVE;

	/**
	 * @var string
	 */
	public string $password = '';

	/**
	 * @var string
	 */
	public string $passwordConfirm = '';


	/**
	 * {@inheritdoc}
	 */
	public function save()
	{
		$this->status = self::STATUS_INACTIVE;
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);

		return parent::save();

	}


	/**
	 * {@inheritdoc}
	 */
	function rules(): array {
		return [
			'firstname' => [self::RULE_REQUIRED],
			'lastname' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
			'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
		];

	}


	/**
	 * {@inheritdoc}
	 */
	public function tableName(): string
	{
		return 'users';

	}


	/**
	 * {@inheritdoc}
	 */
	public function primaryKey(): string
	{
		return 'id';

	}


	/**
	 * {@inheritdoc}
	 */
	public function attributes(): array
	{
		return ['firstname', 'lastname', 'email', 'password', 'status'];

	}


	/**
	 * {@inheritdoc}
	 */
	public function labels(): array {
		return [
			'firstname' => 'First name',
			'lastname' => 'Last name',
			'email' => 'Email',
			'password' => 'Password',
			'passwordConfirm' => 'Confirm Password',
		];

	}


	/**
	 * {@inheritdoc}
	 */
	public function getDisplayName():string
	{
		return $this->firstname . ' ' . $this->lastname;

	}


}
