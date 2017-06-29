<?php

if(!isset($_SESSION))
session_start();

$anObject = null;
$windowName = $_GET["objectName"];

if($windowName == "ongletSemaine"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_prime.php';
	$anObject = new FastechPrime();
	$anObject->getObjectListAsDynamicHeaderFooter(false);
} else if($windowName == "ongletProjet"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
	$anObject = new FastechDepartement();
	$anObject->getObjectListAsDynamicHeaderFooter(false);
}

$_SESSION['current_page'] = $windowName;

?>