<?php

$anObject = null;
$typeName = $_GET["typeName"];
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_' . $typeName . '.php';

if ($typeName == "prime") {
	$anObject = new FastechPrime ();
} else if ($typeName == "work_weeks") {
	$anObject = new FastechWorkWeek();
} else if ($typeName == "employees") {
	$anObject = new FastechEmploye();
} else if ($typeName == "projects") {
	$anObject = new FastechProject();
} else if ($typeName == "departement") {
	$anObject = new FastechDepartement();
}
else if ($typeName == "users") {
	$anObject = new FastechUser();
}


$aName = htmlspecialchars ( $_POST ["name"] );
$aValue = htmlspecialchars ( $_POST ["value"] );
$anID = trim(htmlspecialchars ( $_POST ["id"] ));


$anObject->updateObjectDynamically($aName, $aValue, $anID);

?>