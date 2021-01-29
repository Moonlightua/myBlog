<?php
$this->title = 'Ideas To Change Your Life';
?>
<div class="body" width="100%">
		<div class="title">IDEAS TO CHANGE YOUR LIFE</div>
		<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod fermentum purus. Fusce tortor velit, pulvinar eget dictum id, ultrices ut sem. Aliquam erat volutpat. Sed erat dui, lobortis et maximus quis, tincidunt vel augue. Cras tempus ut eros id gravida. Vestibulum est orci, tincidunt vel dolor et, eleifend viverra felis. Donec lacinia id tortor vitae scelerisque. Cras sed rhoncus odio. Proin ac nisl ante. Maecenas aliquam dignissim ullamcorper.

			Vestibulum bibendum congue orci, eu auctor quam mollis ut. Nam a turpis sollicitudin, molestie nisl in, cursus lacus. Phasellus fermentum velit tortor, quis vulputate tortor imperdiet ac. Donec mollis nulla id aliquet viverra. Suspendisse potenti. Nunc iaculis ut neque dignissim posuere. Sed sagittis leo id ante mattis ultrices.</div>
		<div><img src="/img/titlepage2.jpg" width="100%" ></div>
		<div class="title" width="100%">
			You can always find peace in yourself!</div>
		<div class="text" width="100%" height="100%">Calmness is the mental state of peace of mind being free from agitation, excitement, or disturbance. It also refers being in a state of serenity, tranquillity, or peace. Calmness can most easily occur for the average person during a state of relaxation, but it can also be found during much more alert and aware states.</div>
		<div><img src="/img/titlepage.jpg" alt="" width="100%"></div>
		<div class="title">
			Some people find that focusing the mind on something external, such as studying, or even internal, such as the breathing, can itself be very calming.</div>
		<div class="text">Another term usually associated with calmness is "peace". A mind that is at peace or calm will cause the brain to produce "good" hormones, which in turn give the person a stable emotional state and promote good health in every area of life, including marriage. Seeing the rise in crime and diseases around the world which are more often than not the consequences of the emotions going 'out-of-control', it is therefore considered beneficial for many to stay calm and cultivate it in every possible situation, especially during stressful events such as demise of a family member or failure in business.</div>
		<div class="cont" >
			<img src="/img/middle%20pct.jpg" alt="" width="100%">
			<div class="centered">
				<div class="centertext">Tips for begginers</div>
				<div class="centerbottext">Subscribe and receive the latest tips and tricks, shared by some world-famous authors!</div>
				<div class="title-email">
					<?php /** @var $model \app\models\HomeForm */ ?>
						<?php $form = \app\core\form\Form::begin('/', 'post'); ?>
						<?php echo $form->field($model, 'email') ?>
						<button type="submit" id="button">SEND</button>
					<?php \app\core\form\Form::end() ?>
				</div>
			</div>
		</div>

			<div class="question">
                <span>RECENT ARTICLES</span>
            </div>
				<div class="articles-list">
					<?php
					/** @var $model \app\models\HomeForm */
					$model->lastArticles(6);
					?>
				</div>
			<div class="buttonpos">
				<a href="/blog" class="btn btn-sm animated-button thar-two">
					Go To Blog
				</a>
			</div>
</div>

