<?php
/**
 * Login form class.
 */
namespace app\models;

use app\core\Application;
use app\core\Model;

/**
 * Class LoginForm
 *
 * @package app\models
 */
class LoginForm extends Model
{

	/**
	 * @var string
	 */
	public string $email = '';

	/**
	 * @var string
	 */
	public string $password = '';


	/**
	 * {@inheritdoc}
	 */
	function rules():array
	{
		return [
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'password' => [self::RULE_REQUIRED]
		];

	}


	/**
	 * This method realize login.
	 *
	 * @return bool
	 */
	public function login()
	{
		$user = User::findOne(['email' => $this->email]);
		if (!$user) {
			$this->addError('email', 'User does not exist with this email');
			return false;
		}
		if (!password_verify($this->password, $user->password)) {
			$this->addError('password', 'Password is incorrect');
			return false;
		}

		return Application::$app->login($user);

	}


	/**
	 * {@inheritdoc}
	 */
	public function labels(): array {
		return [
			'email' => 'Email',
			'password' => 'Password'

		];

	}


}
