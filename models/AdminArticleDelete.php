<?php


namespace app\models;


class AdminArticleDelete
{
    public function __construct(?int $id, $model)
    {

        if (isset($_GET['del']) && is_numeric($_GET['del'])) {
            Delete::delete($id, get_class($model));
            if (get_class($model) == 'app\models\Blog') {
                header("Location: /allArticles");
            } elseif (get_class($model) == 'app\models\Messages') {
                header("Location: /messages");
            } else {
                header("Location: /subEmails");
            }
        }
    }
}