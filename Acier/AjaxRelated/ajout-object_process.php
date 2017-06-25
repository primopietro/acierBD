<?php
session_start ();

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
	$anObject->setProduction_total("0");
	$anObject->setId_project(null);
} else if ($typeName == "departement") {
	$anObject = new FastechDepartement();
}

$attributes = $anObject->getObjectAsArrayWithOutMetadata ();

$valuesToBeAdded = $_POST;

foreach ( $valuesToBeAdded as $key => $value ) {

	$attributeName = "set" . ucfirst ( $key );
	$anObject->$attributeName ( $value );
}
$anObject->addDBObject ();

?>