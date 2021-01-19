<?php
/**
 * Migration class.
 */
namespace app\migrations;

use app\core\Application;

/**
 * Class m0005_create_table_messages
 *
 * @package app\migrations
 */
class m0006_create_table_comments
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "CREATE TABLE comments (
    			id INT AUTO_INCREMENT PRIMARY KEY,
    			author VARCHAR(255) NOT NULL,
    			email VARCHAR(255) NOT NULL,
    			text text NOT NULL,
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
		$SQL = "DROP TABLE comments;";
		$db->pdo->exec($SQL);

	}


}
