<?php

namespace app\migrations;

use app\core\Application;

class m0004_create_table_articles
{
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "CREATE TABLE articles (
    			id INT AUTO_INCREMENT PRIMARY KEY,
    			title VARCHAR(255) NOT NULL,
    			text VARCHAR(255) NOT NULL,
    			created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)	ENGINE=INNODB;";
		$db->pdo->exec($SQL);
	}

	public function down()
	{
		$db = Application::$app->db;
		$SQL = "DROP TABLE articles;";
		$db->pdo->exec($SQL);
	}
}