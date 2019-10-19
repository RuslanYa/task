<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

		session_start();

	$host = '127.0.0.1:3306';
	$username = 'admin';
  	$password = '1tkT30gkUI8s';
   	$dbName = 'mydb';


  	$link = mysqli_connect($host, $username, $password, $dbName);
  	mysqli_query($link, "SET NAMES 'utf8'");

 ?>