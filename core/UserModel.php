<?php

namespace app\core;

/**
 * Class UserModel
 *
 * @package app\core
 */
abstract class UserModel extends DbModel
{
	abstract public function getDisplayName(): string;
}