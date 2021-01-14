	<div class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</div>
	<div class="cont">
		<img src="/img/luxfon.com-18755.jpg" alt="">
		<div class="centered">
			<div class="title white">Some motivation and anspiration text.</div>
		</div>
	</div>
	<div class="cont">
		<div class="image-text">
			<img src="/img/103b4eb5990f9ee567126cf456cfb822.jpg" alt="">
		</div>
		<div class="image-text">
			<div class="image-text text">
				<div class="title">Another piece of motivation for better affect.</div><br>
			</div>
				<a href="/blog" style="width:30%" class="btn btn-sm animated-button thar-two"> Go To Blog</a>

		</div>
		<div style="clear:both"></div>
	</div>
	<div class="cont">
		<div class="img">
			<img src="/img/winter-landscape-in-the-black-forest-germany-19397.jpg" alt="">
		</div>
		<div class="centered">
			<div class="title white">
				Some motivation and anspiration text.<br>
				<a href="/blog"  class="btn btn-sm animated-button thar-two2"> Go To Blog</a>
			</div>
		</div>
	</div>

	<div class="cont" >
		<img src="/img/middle%20pct.jpg" alt="" width="100%">
		<div class="centered">
			<div class="centertext">Tips for begginers</div>
			<div class="centerbottext">Subscribe and receive the latest tips and tricks, shared by some world-famous authors!</div>
			<div class="title-email">
				<?php /** @var $model \app\models\HomeForm */ ?>
				<?php $form = \app\core\form\Form::begin('/about', 'post'); ?>
				<?php echo $form->field($model, 'email') ?>
				<button type="submit" id="button">SEND</button>
				<?php \app\core\form\Form::end() ?>
			</div>
		</div>
	</div>