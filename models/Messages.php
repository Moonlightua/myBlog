<?php
/**
 * Messages class.
 */
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

	/**
	 * This method return all messages.
	 *
	 * @return array
	 */
	public function showAllMessages()
	{
		return parent::show(self::EMAILS_TABLE);

	}


}
