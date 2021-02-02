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
class m0013_add_table_article_ids
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
        $SQL = "CREATE TABLE article_id (
    			id INT AUTO_INCREMENT PRIMARY KEY,
    			article_id VARCHAR(255) NOT NULL,
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
		$SQL = "DROP TABLE article_id";
		$db->pdo->exec($SQL);

	}


}
