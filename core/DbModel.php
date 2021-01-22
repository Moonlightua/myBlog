<?php
/**
 * Main database class for models.
 * @file
 */
namespace app\core;

/**
 * Class DbModel
 * @package app\core
 */
abstract class DbModel extends Model
{


	/**
	 * This method return name of table.
	 *
	 * @return string
	 */
	abstract public function tableName(): string;


	/**
	 * This method return attributes for add to database table.
	 *
	 * @return array
	 */
	abstract public function attributes(): array;


	/**
	 * This method return primary key of database table.
	 *
	 * @return string
	 */
	abstract public function primaryKey(): string;


	/**
	 * This method save data to database table.
	 *
	 * @return bool
	 */
	public function save()
	{
		$tableName = $this->tableName();
		$attributes = $this->attributes();
		$params = array_map(fn($attr) => ":$attr", $attributes);
		$statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") 
				VALUES(".implode(',', $params).")");

		foreach ($attributes as $attribute) {
			$statement->bindValue(":$attribute", $this->{$attribute});
            echo $this->{$attribute};
		}
        exit;

		$statement->execute();

		return true;

	}

    public function edit($id)
    {

        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);
        $arr = array_combine($attributes, $params);
        foreach ($arr as $key => $value) {
            $str[] = $key.'='.$value;
        }

        $statement = self::prepare("UPDATE $tableName SET $str[0], $str[1], $str[2] WHERE id=$id");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();

        return true;
	}


	/**
	 * This method prepare statement for database.
	 *
	 * @param $sql
	 * @return false|\PDOStatement
	 */
	public static function prepare($sql)
	{
		return Application::$app->db->pdo->prepare($sql);

	}

	/**
	 * This method search in database at least one similar value.
	 *
	 * @param $where
	 * @return mixed
	 */
	public function findOne($where)
	{
		$tableName = static::tableName();
		$attributes = array_keys($where);
		$sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
		$statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
		foreach ($where as $key => $item) {
			$statement->bindValue(":$key", $item);
		}

		$statement->execute();

		return $statement->fetchObject(static::class);

	}


}
