<?php
/**
 * Contact form class.
 */
namespace app\models;

use app\core\DbModel;

/**
 * Class ContactForm
 *
 * @package app\models
 */
class ContactForm extends DbModel
{
	/**
	 * @var string
	 */
	public string $subject = '';

	/**
	 * @var string
	 */
	public string $email = '';

	/**
	 * @var string
	 */
	public string $body = '';


	/**
	 * {@inheritdoc}
	 */
	public function rules(): array
	{
		return [
			'subject' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'body' => [self::RULE_REQUIRED],
		];

	}


	/**
	 * {@inheritdoc}
	 */
	public function labels(): array
	{
		return [
			'subject' => 'Your subject',
			'email' => 'Email',
			'body' => 'Message',
		];

	}


	/**
	 * {@inheritdoc}
	 */
	public function send()
	{
		return parent::save();

	}


	/**
	 * {@inheritdoc}
	 */
	public function tableName(): string
	{
		return 'messages';

	}


	/**
	 * {@inheritdoc}
	 */
	public function attributes():array
	{
		return ['subject', 'email', 'body'];

	}


	/**
	 * {@inheritdoc}
	 */
	public function primaryKey(): string
	{
		return 'id';

	}


}
