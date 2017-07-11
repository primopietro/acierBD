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
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_work_weeks.php';
	$anObject = new FastechWorkWeek();
	$anObject->getObjectListAsDynamicTable(false);
	
} else if($windowName == "ongletEmploye"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employees.php';
	$anObject = new FastechEmploye();
	$anObject->getObjectListAsDynamicTable(true);
} else if($windowName == "ongletProjet"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_projects.php';
	$anObject = new FastechProject();
	$anObject->getObjectListAsDynamicTable(false);
} else if($windowName == "ongletDepartement"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
	$anObject = new FastechDepartement();
	$anObject->getObjectListAsDynamicTable(true);
} else if($windowName == "ongletCompte"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_users.php';
	$anObject = new FastechUser();
	if($_SESSION['username'] == "admin"){
		$anObject->getObjectListAsDynamicTable(false);
	}
	else{
		$anObject->getCurrentUserAsDynamicTable($_SESSION['username']);
	}
	
} else if($windowName == "ongletHeure"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employe_week_hours.php';
	$weekId = $_GET["id"];
	$anObject = new FastechEmployekWeekHours();
	$anObject->getObjectList($weekId);
	$windowName = "ongletSemaine";
} else if($windowName == "ongletProjetHeure"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employe_week_hours.php';
	$projectId = $_GET["id"];
	$anObject = new FastechEmployekWeekHours();
	$anObject->getProjectHourList($projectId);
	$windowName = "ongletProjet";
} else if($windowName== "ongletCCQ"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_ccq.php';
	$anObject = new FastechCCQ();
	$anObject->getObjectListAsDynamicTable(true);
	
}

$_SESSION['current_page'] = $windowName;

?>