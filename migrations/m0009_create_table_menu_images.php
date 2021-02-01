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
class m0009_create_table_menu_images
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
        $SQL = "CREATE TABLE menu_images (
    			id INT AUTO_INCREMENT PRIMARY KEY,
    			name TEXT,
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
		$SQL = "DROP TABLE menu_images;";
		$db->pdo->exec($SQL);

	}


}
