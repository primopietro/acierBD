<?php

if(!isset($_SESSION))
session_start();

$anObject = null;
$windowName = $_GET["objectName"];

if($windowName == "ongletSemaine"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employees.php';
	$anObject = new FastechEmploye();
	$anObject->getEmployeListAsDynamicTable();
}

$_SESSION['current_page'] = $windowName;

?>