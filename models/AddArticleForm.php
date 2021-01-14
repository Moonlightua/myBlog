<?php

namespace app\models;

use app\core\DbModel;

/**
 * Class SubscribeForm
 *
 * @package app\models
 */
class AddArticleForm extends DbModel
{
	public string $title = '';
	public string $text = '';

	public function rules(): array
	{
		return [
			'title' => [self::RULE_REQUIRED],
			'text' => [self::RULE_REQUIRED]
			];
	}

	public function labels(): array
	{
		return [
			'title' => 'Title',
			'text' => 'Text',
		];
	}

	public function save() {
		return parent::save();
	}

	public function tableName(): string
	{
		return 'articles';
	}

	public function attributes(): array
	{
		return ['title', 'text',];
	}

	public function primaryKey(): string
	{
		return 'id';
	}
}