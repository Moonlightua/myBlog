<?php

/** @var $model \app\models\SubEmails */

use app\models\AdminArticleDelete;
use app\models\SubEmailsRender;

$this->title = 'Subscribers emails';

$emails = $model->showSubList();

if (isset($_GET['del']) && is_numeric($_GET['del'])) {
    $delete = new AdminArticleDelete($_GET['del'], $model);
}

$render = new SubEmailsRender($emails);