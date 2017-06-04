<?php
/***********************************Connect to datase environement*****************************************/
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'acier_fastech';
$conn = new mysqli($dbhost, $dbuser, $dbpass);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

else{	
	echo 'Connected successfully';	
}
echo "<br>";
/******************************************Delete old environement***************************************/
$sql = 'DROP DATABASE ' . $dbname ;
if (!$result = $conn->query($sql)) {
	echo "Could not drop database " . $dbname;
	
}
else{
	echo "Database " . $dbname . " deleted successfully\n";
}
echo "<br>";
/****************************************Create new environement*************************************/

$sql = 'CREATE DATABASE ' . $dbname;
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "Could not create database " . $dbname;
	exit;
}
else{
	echo "Database " . $dbname . " created successfully\n";
}
echo "<br>";
/*******************************************CONNECT TO DATABASE*************************************/
$conn->close();
$conn = null;
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

else{
	echo 'Connected successfully to ' .  $dbname;
}
echo "<br>";

/***************************Database structuring (tables, primary keys, etc.)***********************/

$sql = 'CREATE TABLE `acier_fastech`.`users` 
		( `id_user` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(25) NOT NULL , `password` VARCHAR(25) NOT NULL , PRIMARY KEY (`id_user`)) 
		ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "Could not create table users" ;
	exit;
}
else{
	echo "table users created successfully\n";
}
echo "<br>";
/********************************************Add data**********************************************/



$sql = "INSERT INTO `users` (`id_user`, `username`, `password`) VALUES (NULL, 'admin', 'password')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "Could not insert data into users" ;
	exit;
}
else{
	echo "Data inserted successfully into users\n";
}
echo "<br>";
/**********************************************Close db connection**********************************/
$conn->close();
?>