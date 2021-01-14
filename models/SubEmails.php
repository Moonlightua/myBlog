<?php
/**
 * Sub emails class.
 */
namespace app\models;

/**
 * Class SubEmails
 *
 * @package app\models
 */
class SubEmails extends DbDisplay
{
	const EMAILS_TABLE = 'subscribers';

	/**
	 * This method return all sub emails.
	 *
	 * @return array
	 */
	public function showSubList()
	{
		return parent::show(self::EMAILS_TABLE);

	}


}
