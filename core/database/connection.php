<?php

	#$host = "localhost";
	#$user = "root";
	#$password = "";
	#$dbname = "electronics";
	$host = "https://lodetxelectronics.000webhostapp.com/";
	$user = "id19536743_root";
	$password = "Limkokwing@20";
	$dbname = "id19536743_electronics";

	$dsn = "mysql:host=". $host . "; dbname=". $dbname;

	try {
		$pdo = new PDO($dsn, $user, $password);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	} catch (PDOException $e) {
		echo 'Database Connection Failed. <br/>'. $e->getMessage();
	}

?>