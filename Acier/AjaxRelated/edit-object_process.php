<?php

$anObject = null;
$typeName = $_GET["typeName"];
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_' . $typeName . '.php';

if ($typeName == "prime") {
	$anObject = new FastechPrime();
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
$aName =  str_replace(' ', '&nbsp;', $aName);
$aValue = htmlspecialchars ( $_POST ["value"] );
$aValue =  str_replace(' ', '&nbsp;', $aValue);
$anID = trim(htmlspecialchars ( $_POST ["id"] ));
$anID =  str_replace(' ', '&nbsp;', $anID);

$anObject->updateObjectDynamically($aName, $aValue, $anID);

?>