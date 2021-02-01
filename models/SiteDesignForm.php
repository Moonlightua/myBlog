<?php


namespace app\models;


use app\core\DbModel;

class SiteDesignForm extends DbModel
{

    /**
     * @var string
     */
    public ?string $image = '';

    /**
     * @var string
     */
    public ?string $region = '';

    /**
     * @var string
     */
    public ?string $title = '';

    /**
     * @var string
     */
    public ?string $subtitle = '';

    public function tableName(): string
    {
        return 'menu_images';
    }

    public function attributes(): array
    {
        return ['image', 'region', 'title', 'subtitle'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    function rules(): array
    {
        return [
            'image' => [self::RULE_REQUIRED],
            'region' => [self::RULE_REQUIRED],
            'title' => [self::RULE_REQUIRED],
            'subtitle' => [self::RULE_REQUIRED],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function labels(): array
    {
        return [
            'image' => 'Image',
            'region' => 'Destination of image',
            'title' => 'Title for page',
            'subtitle' => 'Subtitle'
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function save() {

        return parent::save();

    }
}