<?php
/**
 * Get data from database class.
 */
namespace app\models;

use app\core\DbModel;

/**
 * Class DisplayData
 *
 * @package app\models
 */
class DbDisplay
{


	/**
	 * This method return array of all records from database table.
	 *
	 * @param string $table
	 *
	 * @return array
	 */
	public static function show(string $table): array
	{
		$sql = "SELECT * FROM $table ORDER BY id DESC";
		$statement = DbModel::prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();

		return $result;

	}

	/**
	 * This method return array of record by id from database.
	 *
	 * @param string $table
	 * @param string $condition
	 *
	 * @return array
	 */
	public static function showSingle(string $table, string $condition): array
	{
		$sql = "SELECT * FROM $table WHERE id=$condition";
		$statement = DbModel::prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();

		return $result;

	}


    /**
     * This method return array of record by email from database.
     *
     * @param string $table
     * @param string $condition
     *
     * @return array
     */
    public static function showByEmail(string $table, string $condition): array
    {
        $sql = "SELECT * FROM $table WHERE email='$condition'";
        $statement = DbModel::prepare($sql);
        $statement->execute();
        $result = $statement->fetch();

        return $result;

    }


	/**
	 * This method return array of records with limit from database.
	 *
	 * @param string $table
	 * @param int $quantity
	 *
	 * @return array
	 */
	public static function showLastArticles(string $table, int $quantity): array
	{
		$sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $quantity";
		$statement = DbModel::prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();

		return $result;

	}

	public static function getImageName(string $table,int $id)
    {
        $sql = "SELECT * FROM $table WHERE id=$id";
        $statement = DbModel::prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        return $result;
    }


    public static function count(string $table)
    {
        $sql = "SELECT COUNT(*) FROM $table";
        $statement = DbModel::prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        return $result;
    }

    public static function articlesPerPage($table, $offset, $articlesPerPage): array
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $offset, $articlesPerPage";
        $statement = DbModel::prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        return $result;
    }

    /**
     * This method return array of record by email from database.
     *
     * @param string $table
     * @param string $condition
     *
     * @return array
     */
    public static function showByCondition(string $table,string $search, string $condition)
    {
        $sql = "SELECT * FROM $table WHERE $search='$condition'";
        $statement = DbModel::prepare($sql);
        $statement->execute();
        $result = $statement->fetch();

        return $result;

    }

}
