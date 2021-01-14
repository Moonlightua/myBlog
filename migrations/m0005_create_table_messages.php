<?php

namespace app\migrations;

use app\core\Application;

class m0005_create_table_messages
{
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "CREATE TABLE messages (
    			id INT AUTO_INCREMENT PRIMARY KEY,
    			subject VARCHAR(255) NOT NULL,
    			email VARCHAR(255) NOT NULL,
    			text text NOT NULL,
    			created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)	ENGINE=INNODB;";
		$db->pdo->exec($SQL);
	}

	public function down()
	{
		$db = Application::$app->db;
		$SQL = "DROP TABLE messages;";
		$db->pdo->exec($SQL);
	}
}