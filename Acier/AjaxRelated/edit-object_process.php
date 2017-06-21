<?php

$anObject = null;
$typeName = $_GET["typeName"];
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_' . $typeName . '.php';

if ($typeName == "prime") {
	$anObject = new FastechPrime ();
} else if ($typeName == "work_week") {
	$anObject = new FastechWorkWeek();
} else if ($typeName == "employe") {
	$anObject = new FastechEmploye();
} else if ($typeName == "project") {
	$anObject = new FastechProject();
} else if ($typeName == "departement") {
	$anObject = new FastechDepartement();
}


$aName = htmlspecialchars ( $_POST ["name"] );
$aValue = htmlspecialchars ( $_POST ["value"] );
$anID = htmlspecialchars ( $_POST ["id"] );


$anObject->updateObjectDynamically($aName, $aValue, $anID);

?>