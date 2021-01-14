<?php

namespace app\models;

use app\core\DbModel;

/**
 * Class SubEmails
 *
 * @package app\models
 */
class Messages extends DbDisplay
{
	const EMAILS_TABLE = 'messages';

	public function showAllMessages()
	{
		return parent::show(self::EMAILS_TABLE);
	}


}