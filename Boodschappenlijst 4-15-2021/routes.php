<?php

$router->get('', 'pagesController@home');
$router->get('index', 'pagesController@home');
$router->get('tables', 'pagesController@tables');
$router->get('groceries', 'pagesController@groceries');
$router->post('dynDelete', 'pagesController@dynDelete');
$router->post('dynUpdate', 'pagesController@dynUpdate');
$router->post('dynInsert', 'pagesController@dynInsert');
$router->post('GroceryButton', 'pagesController@GroceryButton');
