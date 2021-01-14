<?php
/** @var $model \app\models\User */
?>
	<div class="login">
		<div class="title contact">Login</div>

		<?php $form = \app\core\form\Form::begin('', "post")?>
		<?php echo $form->field($model, 'email') ?>
		<?php echo $form->field($model, 'password')->passwordField() ?>

		<button type="submit" class="button contact">Submit</button>
		<?php \app\core\form\Form::end() ?>
	</div>
