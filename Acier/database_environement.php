<?php
/***********************************Connect to datase environement*****************************************/
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'acier';
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

/********************************************Add data**********************************************/


/**********************************************Close db connection**********************************/
$conn->close();
?>