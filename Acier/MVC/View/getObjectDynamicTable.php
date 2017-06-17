<?php

if(!isset($_SESSION))
session_start();
$anObject = null;
$windowName = $_GET["objectName"];

if($windowName== "ongletPrime"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_prime.php';
	$anObject = new FastechPrime();
	
} else if($windowName == "ongletSemaine"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_work_week.php';
	$anObject = new FastechWorkWeek();
} else if($windowName == "ongletEmploye"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employe.php';
	$anObject = new FastechEmploye();
} else if($windowName == "ongletProjet"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_project.php';
	$anObject = new FastechProject();
} else if($windowName == "ongletDepartement"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
	$anObject = new FastechDepartement();
} 
$_SESSION['current_page'] = $windowName;
$anObject->getObjectListAsDynamicTable("");
?>