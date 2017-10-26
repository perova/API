<?php

	// define('DBhost', 'localhost');
	// define('DBuser', 'root');
	// define('DBPass', '');
	// define('DBname', 'test');
	
	try {
		
		$DBcon = new PDO("mysql:host=localhost;dbname=regitra;charset=utf8", "root", "");
		
	} catch(PDOException $e){
		
		die($e->getMessage());
	}

// try {

// 			$conn = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");
//         // set the PDO error mode to exception
// 			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 			$statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
// 			$statement->bindParam(':username', $_POST['username']);
// 			$statement->execute();

// 			$user_data = $statement->fetch(PDO::FETCH_ASSOC);

// 			} catch(PDOException $e) {
// 				echo $e->getMessage();
// 			}