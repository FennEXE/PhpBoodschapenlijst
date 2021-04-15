<?php


class pagesController
{
	public function home()
	{
		//controller domain
		require "views/index.view.php"; //HTML stuff
	}

	public function groceries()
	{

		require "views/groceries.view.php"; //HTML stuff
	}

	public function tables()
	{
		require "views/tables.view.php"; //HTML stuff
	}

	public function dynDelete()
	{
		require 'core/bootstrap.php';
		$connection2 = connection::make($config['database']);
		$query2 = new makeQuery($connection);

		//Saves the referer to dynamically return the user back to the last page
		$ref = $_SERVER['HTTP_REFERER'];
		$lastPage = parse_url($ref, PHP_URL_PATH);

		//deletes the selected name from the database table
		$query2->dynamicDelete($_REQUEST["table"], "name", ucfirst(strtolower($_REQUEST['deleteName'])));

		//Returns user to last page
		header("Location: {$lastPage}");
	}

	public function dynInsert()
	{
		require 'core/bootstrap.php';
		$connection2 = connection::make($config['database']);
		$query2 = new makeQuery($connection);

		//Saves the referer to dynamically return the user back to the last page
		$ref = $_SERVER['HTTP_REFERER'];
		$lastPage = parse_url($ref, PHP_URL_PATH);

		//inserts a new item in the database table.
		$query2->dynamicInsert($_REQUEST["table"], ["name" => ucfirst(strtolower($_REQUEST['insertName'])), "number" => "0", "price" => $_REQUEST['insertPrice']]);

		//Returns user to last page
		header("Location: {$lastPage}");

	}

	public function dynUpdate()
	{
		require 'core/bootstrap.php';
		$connection2 = connection::make($config['database']);
		$query2 = new makeQuery($connection);
		
		//Saves the referer to dynamically return the user back to the last page
		$ref = $_SERVER['HTTP_REFERER'];
		$lastPage = parse_url($ref, PHP_URL_PATH);
		
		//Updates the selected name in the database table to a new price.
		$query2->dynamicUpdate($_REQUEST["table"], "price", $_REQUEST['updatePrice'], "name", ucfirst(strtolower($_REQUEST['updateName'])));
		
		//Returns user to last page
		header("Location: {$lastPage}");
		
	}

	public function GroceryButton()
	{
		require 'core/bootstrap.php';
		$connection2 = connection::make($config['database']);
		$query2 = new makeQuery($connection);

		//Saves the referer to dynamically return the user back to the last page
		$ref = $_SERVER['HTTP_REFERER'];
		$lastPage = parse_url($ref, PHP_URL_PATH);

		$pieces = explode("|", array_values($_REQUEST)[0]);
		$id = $pieces[0];
		$number = $pieces[1];
		$keyword = $pieces[2];
		
		if ($keyword === "minus" && $number >= 1) 
		{
			$number = $number - 1;
			
			//Updates the selected name in the database table to a new price.
			$query2->dynamicUpdate("items", "number", $number, "id", $id);
		} 
		else if ($keyword === "plus") 
		{
			$number = $number + 1;

			//Updates the selected name in the database table to a new price.
			$query2->dynamicUpdate("items", "number", $number, "id", $id);
		} 
		//Returns user to last page
		header("Location: {$lastPage}");
	}
}