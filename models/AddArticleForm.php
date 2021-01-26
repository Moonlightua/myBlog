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
	 * @var string
	 */
	public ?string $image = '';

    /**
     * @var string
     */
    public ?string $subtitle = '';


	/**
	 * {@inheritdoc}
	 */
	public function rules(): array
	{
		return [
			'title' => [self::RULE_REQUIRED],
			'text' => [self::RULE_REQUIRED],
            'image' => [self::RULE_REQUIRED],
            'subtitle' => [self::RULE_REQUIRED],
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
			'image' => 'Image',
            'subtitle' => 'Short Description'
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
		return ['title', 'text', 'image', 'subtitle'];

	}


	/**
	 * {@inheritdoc}
	 */
	public function primaryKey(): string
	{
		return 'id';

	}


    public function edit($id)
    {
        return parent::edit($id);
	}
}
