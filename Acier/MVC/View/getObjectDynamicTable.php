<?php

if(!isset($_SESSION))
session_start();
$anObject = null;
$windowName = $_GET["objectName"];

if($windowName== "ongletPrime"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_prime.php';
	$anObject = new FastechPrime();
	$anObject->getObjectListAsDynamicTable(true);
	
} else if($windowName == "ongletSemaine"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_work_week.php';
	$anObject = new FastechWorkWeek();
	$anObject->getObjectListAsDynamicTable(false);
	
} else if($windowName == "ongletEmploye"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employe.php';
	$anObject = new FastechEmploye();
	$anObject->getObjectListAsDynamicTable(true);
} else if($windowName == "ongletProjet"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_project.php';
	$anObject = new FastechProject();
	$anObject->getObjectListAsDynamicTable(false);
} else if($windowName == "ongletDepartement"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
	$anObject = new FastechDepartement();
	$anObject->getObjectListAsDynamicTable(true);
} else if($windowName == "ongletCompte"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_user.php';
	$anObject = new FastechUser();
	$anObject->getObjectListAsDynamicTable(true);
} 

$_SESSION['current_page'] = $windowName;

?>