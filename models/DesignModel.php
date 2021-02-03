<?php


namespace app\models;


class DesignModel extends DbDisplay
{

    public static function imageExist($region): bool
    {
        if (substr($region, 0, 5) == '/blog') {
            $region = $_SERVER['PATH_INFO'];
        } elseif (substr($region, 0,12) == '/allArticles') {
            $region = $_SERVER['PATH_INFO'];
        }
        $image = self::showByCondition('menu_images', 'region', $region);
        if ($image) {
            return true;
        }
        return false;

    }

    public static function imageName($region): string
    {
        if (substr($region, 0, 5) == '/blog') {
            $region = $_SERVER['PATH_INFO'];
        } elseif (substr($region, 0,12) == '/allArticles') {
            $region = $_SERVER['PATH_INFO'];
        } elseif ($region == '/') {
            return 'home.mp4';
        }

        $image = self::showByCondition('menu_images', 'region', $region);
        return $image['image'];
    }


    public static function renderImage($name)
    {

        echo <<< msg
           <div class="menu-header-image"><img src="../img/menu-images/$name"></div> 

msg;
    }

    public static function renderTitle($region)
    {
        if (substr($region, 0, 5) == '/blog') {
            $region = $_SERVER['PATH_INFO'];
        } elseif (substr($region, 0,12) == '/allArticles') {
            $region = $_SERVER['PATH_INFO'];
        }
        $image = self::showByCondition('menu_images', 'region', $region);

        echo "<div class='menu-image_title'>{$image['title']}</div>";
    }

    public static function renderSubtitle($region)
    {
        if (substr($region, 0, 5) == '/blog') {
            $region = $_SERVER['PATH_INFO'];
        } elseif (substr($region, 0,12) == '/allArticles') {
            $region = $_SERVER['PATH_INFO'];
        }
        $image = self::showByCondition('menu_images', 'region', $region);

        echo "<div class='menu-image_subtitle'>{$image['subtitle']}</div>";
    }
}