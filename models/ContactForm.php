<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

/**
 * Class ContactForm
 *
 * @package app\models
 */
class ContactForm extends DbModel
{
	public string $subject = '';
	public string $email = '';
	public string $body = '';

	public function rules(): array
	{
		return [
			'subject' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'body' => [self::RULE_REQUIRED],
		];
	}

	public function labels(): array
	{
		return [
			'subject' => 'Your subject',
			'email' => 'Email',
			'body' => 'Message',
		];
	}

	public function send()
	{
		return parent::save();
	}

	public function tableName(): string
	{
		return 'messages';
	}

	public function attributes():array
	{
		return ['subject', 'email', 'body'];
	}

	public function primaryKey(): string
	{
		return 'id';
	}
}