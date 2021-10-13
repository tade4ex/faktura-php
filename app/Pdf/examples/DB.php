<?php

$mysql_host = 'localhost';
$port = '3306';
$username = 'karol';
$password = 'karol1998';
$database = 'invoices';



class DB {
	const HOST = 'localhost';
	const PORT = '3306';
	const USERNAME = 'karol';
	const PASSWORD = 'karol1998';
	const DATABASE = 'invoices';

	public function __construct()
	{
		// try {
		// 	$this->pdo = new PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE.';port='.self::PORT, self::USERNAME, self::PASSWORD);
		// } catch(PDOException $e){
		// 	echo 'Połączenie nie mogło zostać utworzone.<br />';
		// }
	}
}