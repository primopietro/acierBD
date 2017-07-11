<?php

if(!isset($_SESSION))
session_start();

$anObject = null;
$tableName = $_GET["objectName"];

if($tableName == "ongletSemaine"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_prime.php';
	$anObject = new FastechPrime();
	$anObject->getObjectListAsDynamicHeaderFooter(true);
} else if($tableName == "ongletProjet"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
	$anObject = new FastechDepartement();
	$anObject->getObjectListAsDynamicHeaderFooter(true);
}

$_SESSION['current_page'] = $tableName;
?>