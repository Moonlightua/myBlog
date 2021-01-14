<?php
/**
 * Migration class.
 */
namespace app\migrations;

use app\core\Application;

/**
 * Class m0003_create_table_subscribers
 *
 * @package app\migrations
 */
class m0003_create_table_subscribers
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "CREATE TABLE subscribers (
    			id INT AUTO_INCREMENT PRIMARY KEY,
    			email VARCHAR(255) NOT NULL,
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
		$SQL = "DROP TABLE subscribers;";
		$db->pdo->exec($SQL);

	}


}
