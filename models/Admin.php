<?php
/**
 * Main model for admin functions
 *
 * @file
 */

namespace app\models;


class Admin
{



    public static function getFileName(string $path, array $file, string $search)
    {
        $position = strpos($path,$search);
        $id = substr($path, $position + 6, strlen($path));

            $filename = $file['image']['name'];

            $dot = strpos($filename, '.');
            $str = (strlen($filename)) - $dot;
            $name = substr($_FILES['image']['name'], -$str);
            $image_name = $id.$name;
            $image_path = '../public/img/'. $image_name;

            $arr = [
                'id' => $id,
                'name' => $image_name
            ];

            $copy = copy($_FILES['image']['tmp_name'], $image_path);

            return ($copy === true) ? $arr : false;

    }


}