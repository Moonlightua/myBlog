<?php
/** @var $model \app\models\User */
$this->title = 'Register';
?>
<div class="login">
			<div class="title contact">Register</div>


		<?php $form = \app\core\form\Form::begin('', "post")?>
			<div class="row">
				<div class="col"><?php echo $form->field($model, 'firstname') ?></div>
				<div class="col"><?php echo $form->field($model, 'lastname') ?></div>
			</div>
			<?php echo $form->field($model, 'email') ?>
			<?php echo $form->field($model, 'password')->passwordField() ?>
			<?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>

		<button type="submit" class="button contact">Submit</button>
		<?php \app\core\form\Form::end() ?>
</div>