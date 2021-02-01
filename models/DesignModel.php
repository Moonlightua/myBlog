<?php


namespace app\models;


class DesignModel extends DbDisplay
{

    public static function imageExist($region): bool
    {
        $image = self::showByCondition('menu_images', 'region', $region);
        if ($image) {
            return true;
        }
        return false;

    }

    public static function imageName($region): string
    {
        $image = self::showByCondition('menu_images', 'region', $region);
        return $image['image'];
    }


    public static function renderImage($name)
    {
        echo <<< msg
            <img src="../img/menu-images/$name">

msg;
    }

    public static function renderTitle($region)
    {
        $image = self::showByCondition('menu_images', 'region', $region);

        echo "<div class='menu-image_title'>{$image['title']}</div>";
    }

    public static function renderSubtitle($region)
    {
        $image = self::showByCondition('menu_images', 'region', $region);

        echo "<div class='menu-image_subtitle'>{$image['subtitle']}</div>";
    }
}