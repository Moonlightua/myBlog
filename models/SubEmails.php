<?php

namespace app\models;

/**
 * Class SubEmails
 *
 * @package app\models
 */
class SubEmails extends DbDisplay
{
	const EMAILS_TABLE = 'subscribers';

	public function showSubList()
	{
		return parent::show(self::EMAILS_TABLE);
	}
}