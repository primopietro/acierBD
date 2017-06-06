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
	echo "<span style='color:red;'>Could not drop database " . $dbname . "</span>";
	
}
else{
	echo "<span style='color:green;'>Database " . $dbname . " deleted successfully</span>\n";
}
echo "<br>";
/****************************************Create new environement*************************************/

$sql = 'CREATE DATABASE ' . $dbname;
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create database " . $dbname . "</span>";
	exit;
}
else{
	echo "<span style='color:green;'>Database " . $dbname . " created successfully</span>\n";
}
echo "<br>";
/*******************************************CONNECT TO DATABASE*************************************/
$conn->close();
$conn = null;
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
	echo "<span style='color:red;'>Connection failed" . $dbname . "</span>";
}

else{
	echo '<span color="green"> Connected successfully to ' .  $dbname . "</span>";
}
echo "<br>";

/***************************Database structuring (tables, primary keys, etc.)***********************/

$sql = 'CREATE TABLE `acier_fastech`.`users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
PRIMARY KEY ( `id_user`)
) ENGINE=InnoDB ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table users</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table users created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`employees` (
  `id_employe` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `family_name` varchar(25) NOT NULL,
  `id_state` int(11) NOT NULL,
PRIMARY KEY ( `id_employe`)
) ENGINE=InnoDB  ';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table employees</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table employees created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`projects` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `budget` double NOT NULL,
`id_state` int NOT NULL,
PRIMARY KEY ( `id_project`)
) ENGINE=InnoDB';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table projects</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table projects created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`states` 
( `id_state` INT NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(25) NOT NULL , 
PRIMARY KEY (`id_state`)) ENGINE = InnoDB;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table states</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table states created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`departement` (
  `name` varchar(25) NOT NULL,
  `amount` double NOT NULL,
`id_state` int NOT NULL,
PRIMARY KEY (`name`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table departement</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table departement created successfully</span>\n";
}
echo "<br>";

$sql = 'CREATE TABLE `acier_fastech`.`work_weeks` (
  `id_work_week` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `begin_date` date NOT NULL,
  `begin_day` int(11) NOT NULL,
PRIMARY KEY ( `id_work_week`)
) ENGINE=InnoDB';
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not create table work_weeks</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Table work_weeks created successfully</span>\n";
}
echo "<br>";


/********************************************Add data**********************************************/



$sql = "INSERT INTO `users` (`id_user`, `username`, `password`) VALUES (null, 'admin', 'password')";
if (!$result = $conn->query($sql)) {
	// Oh no! The query failed.
	echo "<span style='color:red;'>Could not insert data into users</span>" ;
	exit;
}
else{
	echo "<span style='color:green;'>Data inserted successfully into users</span>\n";
}
echo "<br>";




/**********************************************Close db connection**********************************/
$conn->close();
?>