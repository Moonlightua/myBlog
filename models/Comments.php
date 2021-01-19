<?php
/**
 * Main comments form file.
 * @file
 */
namespace app\models;

use app\core\DbModel;

/**
 * Class CommentsForm
 *
 * @package app\models
 */
class Comments extends DbModel
{

	public string $email = '';
	public string $name = '';
	public string $text = '';

	public function save()
	{
		return parent::save();
	}

	public function tableName(): string
	{
		return 'comments';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'text'];
	}

	public function primaryKey(): string
	{
		return 'id';
	}

	function rules(): array
	{
		return [
			'name' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'text' => [self::RULE_REQUIRED]
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function labels(): array {
		return [
			'name' => 'Your Name',
			'email' => 'Email',
			'text' => 'Message'
		];

	}

}