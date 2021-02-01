<?php

/** @var $model SiteDesignForm */

use app\core\form\Form;
use app\core\form\TextareaField;
use app\models\SiteDesignForm;

$this->title = 'Change Site Design';
?>




<h1>Change Design</h1>

<?php $form = Form::addArticleForm('Design', 'post'); ?>
<?php echo $form->field($model, 'title') ?>
<?php echo $form->field($model, 'subtitle') ?>
<?php echo "<div>" . $form->imageField() . "</div>"; ?>
<?php echo "<div>" . $form->regionsSelection() . "</div>"; ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end(); ?>

