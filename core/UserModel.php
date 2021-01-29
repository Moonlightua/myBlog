<?php
/**
 * Model for user.
 */
namespace app\core;

/**
 * Class UserModel
 *
 * @package app\core
 */
abstract class UserModel extends DbModel
{


	/**
	 * This method display user name.
	 *
	 * @return string
	 */
	abstract public function getDisplayName(): string;


    /**
     * This method display user name.
     *
     * @return string
     */
    abstract public function getDisplayEmail(): string;


    /**
     * This method display user name.
     *
     * @return string
     */
    abstract public function getDisplayCreatedDate(): string;


    /**
     * This method display user name.
     *
     * @return string
     */
    abstract public function getDisplayImage(): string;
}
