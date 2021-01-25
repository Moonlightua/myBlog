<?php


namespace app\models;


class MessagesRender
{

    public function __construct($messages)
    {
        foreach ($messages as $article) {
            $email = $article['email'];
            $id = $article['id'];
            $time = $article['created_at'];
            $subject = $article['subject'];
            $text = $article['body'];

            echo <<< msg
		<p>
			<b>$id.) $email [$time]</b><br>
			<b>$subject</b><br>
			$text
		</p>
		<p align="right">
		<a href="/messages?del=$id">Delete</a>
	</p>
<hr>
msg;
        }
    }
}