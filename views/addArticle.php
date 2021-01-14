<?php


/** @var $model \app\models\AddArticleForm */

use app\core\form\TextareaField;


?>


<h1>Add Article</h1>

<?php $form = \app\core\form\Form::begin('addArticle', 'post'); ?>
<?php echo $form->field($model, 'title') ?>
<?php echo new TextareaField($model, 'text') ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php \app\core\form\Form::end(); ?>
