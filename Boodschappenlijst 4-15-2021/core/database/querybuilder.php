<?php

//Grocery class
class Groceries
{
	public $id;
	public $name;
	public $number;
	public $price;
}

//Creates select queries.
class MakeQuery
{
	protected $connection;

	public function __construct($connection)
	{
		$this->connection = $connection;
	}

	//Selects all items in a table and puts them into a class
	public function selectAll($table, $intoClass)
	{
		$sqlSelect = $this->connection->prepare("SELECT * FROM {$table}");

		$sqlSelect->execute();

		return $sqlSelect->fetchAll(PDO::FETCH_CLASS, $intoClass);
	}

	//Dynamic Query Update
	public function dynamicUpdate($table, $updateColumn, $updateValue, $column, $value)
	{
		$sql = sprintf(
			'UPDATE `groceries`.`%s`
			SET `%s`=\'%s\'
			WHERE `%s`=\'%s\';',
			$table, 
			$updateColumn,
			$updateValue,
            $column,
            $value
		);
	
		try{
			
			$statement = $this->connection->prepare($sql);
			$statement->execute();
			
		} catch (Exception $e) {
			die("Whoops, something went wrong.");
		}
	}

	//Dynamic Query Insert
	public function dynamicInsert($table, $parameters)
	{
		$sql = sprintf(
			'insert into `groceries`.`%s` (%s) values (%s);',
			$table, 
			'`' . implode('`, `', array_keys($parameters)) . '`',
			'\'' .  implode('\', \'', array_values($parameters)) . '\''
		);
	
		try{
			$statement = $this->connection->prepare($sql);
			$statement->execute();
		} catch (Exception $e) {
			die("Whoops, something went wrong.");
		}
	}

	//Dynamic Query Delete
	public function dynamicDelete($table, $deleteColumn, $deleteValue)
	{
		$sql = sprintf(
			'DELETE FROM `groceries`.`%s` 
			WHERE  `%s`=\'%s\';',
			$table, 
			$deleteColumn,
			$deleteValue
		);
	
		try{
			
			$statement = $this->connection->prepare($sql);
			$statement->execute();
			
		} catch (Exception $e) {
			die("Whoops, something went wrong.");
		}
	}
}

