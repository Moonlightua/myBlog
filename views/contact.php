<?php

/** @var $this \app\core\View */
/** @var $model \app\models\ContactForm */

use app\core\form\TextareaField;

$this->title = 'Contact';
?>



<div class="backcolorcontact">
	<div class="cont">
		<img src="/img/meadow_forest_field_sky_trees_111008_1600x900.jpg" alt="" width="1583" height="650">
        <div class="centered contact">
            <div class="title contact">Contact Us!</div>

            <?php $form = \app\core\form\Form::begin('contact', 'post'); ?>
            <?php echo $form->field($model, 'subject') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo new TextareaField($model, 'body') ?>

            <div class="butcont"><button type="submit" class="button contact">Submit</button></div>

            <?php \app\core\form\Form::end(); ?>
        </div>
	</div>
	<div>
		<div class="map">Find Us Here</div>
		<div class="float">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493419.8195592351!2d21.551187238287415!3d66.03212288341525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x45d58ad11a6baac1%3A0x2c2cd387ead99f1a!2z0JHRg9C00LXQvSwg0KjQstC10YbQuNGP!5e0!3m2!1sru!2sua!4v1603043683607!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
		<div class="map2">Contacts</div>
		<div class="contactdata"><b>Address:</b> 34 St. Blue Berries Lakatrask</div>
		<div class="contactdata"><b>We are open:</b> Mon – Sun, 24/7</div>
		<div class="contactdata"><b>Phone:</b> +380 10 4192 001</div>
		<div class="contactdata"><b>E-mail:</b> relaxallisfine@gmail.com</div>
	</div>
	<div style="clear:both"></div>
	<div class="cont">
		<img src="/img/middle%20pct.jpg" alt="" width="1583">
		<div class="centered">
			<div class="centertext">Tips for begginers</div>
			<div class="centerbottext">Subscribe and receive the latest tips and tricks, shared by some world-famous authors!</div>
		</div>
	</div>
</div>