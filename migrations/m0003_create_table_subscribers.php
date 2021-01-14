<?php

namespace app\migrations;

use app\core\Application;

class m0003_create_table_subscribers
{
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

	public function down()
	{
		$db = Application::$app->db;
		$SQL = "DROP TABLE subscribers;";
		$db->pdo->exec($SQL);
	}
}