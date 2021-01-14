<?php
/**
 * Migration class.
 */
namespace app\migrations;

use app\core\Application;

/**
 * Class m0001_initial
 *
 * @package app\migrations
 */
class m0001_initial
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "CREATE TABLE users (
    			id INT AUTO_INCREMENT PRIMARY KEY,
    			email VARCHAR(255) NOT NULL,
    			firstname VARCHAR(255) NOT NULL,
    			lastname VARCHAR(255) NOT NULL,
    			status TINYINT NOT NULL,
    			created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)	ENGINE=INNODB;";
		$db->pdo->exec($SQL);

	}


	/**
	 * This method remove migration.
	 */
	public function down()
	{
		$db = Application::$app->db;
		$SQL = "DROP TABLE users;";
		$db->pdo->exec($SQL);

	}


}
