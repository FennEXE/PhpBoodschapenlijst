<?php

$config = require 'config.php';

//Connects to SQL database, located in database/connection.php
$connection = Connection::make($config['database']);

$query = new MakeQuery($connection);
$Items = $query->selectAll('items', 'Groceries');
$secondItems = $query->selectAll('names', 'Groceries');

// throw exceptions, when SQL error is caused
$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

// prevent emulation of prepared statements
$connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

