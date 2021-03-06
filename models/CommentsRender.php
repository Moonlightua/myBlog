<?php


namespace app\models;


use app\core\form\Form;
use app\core\form\TextareaField;

class CommentsRender
{

    public function __construct($comments)
    {
        echo '<div class="comments">';
        echo '<div class="title comment"><span>comments</span></div>';

        // ------Block All Comments------

        echo '<div class="comments all">';
        $display = new DbDisplay();
        $commentArray = $display->show('comments');

        foreach ($commentArray as $item) {
            $name = $item['name'];
            $date = $item['created_at'];
            $time = substr(str_replace('-','.', $date), 0,strlen($date) - 3);
            $text = $item['text'];
            $id = $item['id'];
            $email = $item['email'];

            echo <<< msg
							<div class="comments-item">
								<div class="comments-header">
									<div class="comments-name">$name</div> 
									<div class="comments-email">$email</div> 
								</div>
								<div class="comments-text">$text</div>
								<div class="comments-time">$time</div>
								<hr>
							</div>
					msg;
        }
        echo '</div>';
        // ------Block Comment Form------
        echo '<div class="title comment"><span>leave your comment!</span></div>';
        echo '<div class="comment-form">';
        $form = Form::begin('', "post");
        echo '<div class="row">';
        echo '<div class="col">';
        echo $form->field($comments, 'name');
        echo '</div>';
        echo '<div class="col">';
        echo $form->field($comments, 'email');
        echo '</div>';
        echo '</div>';
        echo '<div class="comments-textarea">';
        echo new TextareaField($comments, 'text');
        echo '</div>';
        echo '<div class="comments-button">';
        echo'<button type="submit" class="button contact">Submit</button>';
        echo '</div>';
        Form::end();
        echo '</div>';
        echo '</div>';

    }

}