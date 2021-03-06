<?php


/** @var $model \app\models\AddArticleForm */

use app\core\form\Form;
use app\core\form\TextareaField;

$this->title = 'Add New Article';
?>




<h1>Add Article</h1>

<?php $form = Form::addArticleForm('addArticle', 'post'); ?>
<?php echo $form->field($model, 'title') ?>
<?php echo $form->field($model, 'subtitle') ?>
<?php echo $form->imageField(); ?>
<?php echo new TextareaField($model, 'text') ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end(); ?>


