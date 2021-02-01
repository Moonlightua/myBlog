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
class m0010_add_menu_images_region_column
{


	/**
	 * This method realize migration.
	 */
	public function up()
	{
		$db = Application::$app->db;
		$SQL = "ALTER TABLE menu_images ADD region text";
		$db->pdo->exec($SQL);

	}


	/**
	 * This method remove migration.
	 */
	public function down()
	{
		$db = Application::$app->db;
		$SQL = "ALTER TABLE menu_images DROP COLUMN region;";
		$db->pdo->exec($SQL);

	}


}
