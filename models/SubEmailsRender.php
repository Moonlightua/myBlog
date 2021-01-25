<?php


namespace app\models;


class SubEmailsRender
{

    public function __construct($emails)
    {
        foreach ($emails as $article) {
            $email = $article['email'];
            $id = $article['id'];
            $time = $article['created_at'];

            echo <<< msg
		<p>
			<b>$id.) $email [$time]</b><br>
		</p>
		<p align="right">
		<a href="/subEmails?del=$id">Delete</a>
	</p>
<hr>
msg;

        }

    }
}