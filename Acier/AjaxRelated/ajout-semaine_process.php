<?php

require_once '../database_connect.php';

if(isset($_GET["suffixe"]) && isset($_GET["debut"]) && isset($_GET["fin"])){
	$suffixe = htmlspecialchars($_GET["suffixe"]);
	$debut = htmlspecialchars($_GET["debut"]);
	$fin = htmlspecialchars($_GET["fin"]);
	echo "success";
	
	//***PIETRO***
	//$result = $conn->query("SELECT * FROM users WHERE username = '" . $username  . "' AND password = '" . $password . "'");
		
	/*if($result->num_rows > 0){
		$conn->close();
		session_start();
		$_SESSION['username'] = $username;
		
		echo "success";
	}*/
	
}

?>