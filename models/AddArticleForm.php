<?php
/**
 * Add article form class.
 */
namespace app\models;

use app\core\DbModel;

/**
 * Class SubscribeForm
 *
 * @package app\models
 */
class AddArticleForm extends DbModel
{

	/**
	 * @var string
	 */
	public string $title = '';

	/**
	 * @var string
	 */
	public string $text = '';


	/**
	 * {@inheritdoc}
	 */
	public function rules(): array
	{
		return [
			'title' => [self::RULE_REQUIRED],
			'text' => [self::RULE_REQUIRED]
			];

	}


	/**
	 * {@inheritdoc}
	 */
	public function labels(): array
	{
		return [
			'title' => 'Title',
			'text' => 'Text',
		];

	}


	/**
	 * {@inheritdoc}
	 */
	public function save() {
		return parent::save();

	}


	/**
	 * {@inheritdoc}
	 */
	public function tableName(): string
	{
		return 'articles';

	}


	/**
	 * {@inheritdoc}
	 */
	public function attributes(): array
	{
		return ['title', 'text'];

	}


	/**
	 * {@inheritdoc}
	 */
	public function primaryKey(): string
	{
		return 'id';

	}


}
