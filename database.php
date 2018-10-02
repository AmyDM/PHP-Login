<?php 
	$server='localhost';
	$username='root';
	$password='';
	$database='database_login';
	
	try{
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch(PDOException $err){
		die('Conexión fallida: '. $err->getMessage());
	}
	
  ?>
