<?php
/**
 * Migration class.
 */
namespace app\migrations;

use app\core\Application;

/**
 * Class m0002_add_password_column
 *
 * @package app\migrations
 */
class m0002_add_password_column
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL";
		$db->pdo->exec($SQL);

	}


	/**
	 * This method remove migration.
	 */
	public function down()
	{
		$db = Application::$app->db;
		$SQL = "ALTER TABLE users DROP COLUMN password;";
		$db->pdo->exec($SQL);

	}


}
