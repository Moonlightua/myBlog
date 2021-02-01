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
class m0011_add_menu_images_text_subtitle_columns
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "ALTER TABLE menu_images ADD title text";
		$db->pdo->exec($SQL);

	}


	/**
	 * This method remove migration.
	 */
	public function down()
	{
		$db = Application::$app->db;
		$SQL = "ALTER TABLE menu_images DROP COLUMN title";
		$db->pdo->exec($SQL);

	}


}
