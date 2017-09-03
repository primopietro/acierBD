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
} else if ($typeName == "employe_week_hours"){
	$anObject = new FastechEmployekWeekHours();
	$anObject->setId_state(1);
} else if ($typeName == "ccq"){
	$anObject = new FastechCCQ();
} else if($typeName == "prix_revient"){
	$anObject = new FastechPrixRevient();
} else if($typeName == "taux_departement_revient"){
	$anObject = new FastechTauxDepartemenRevient();
}
else if($typeName == "bankholiday_payement"){
	$anObject = new FastechTauxDepartemenRevient();
}

$attributes = $anObject->getObjectAsArrayWithOutMetadata ();

$valuesToBeAdded = $_POST;

foreach ( $valuesToBeAdded as $key => $value ) {
	$attributeName = "set" . ucfirst ( $key );
	if($key == "bool_ccq" || $key == "bool_production" || $key == "bool_autre"){
		$value = 2;
	}
	if($key == "end_date" && $typeName == "prix_revient"){
		$value= strtotime($value);
		$value= strtotime("+7 day", $value);
		$value = date('Y-m-d', $value);
	}
	$anObject->$attributeName ( $value );
}
$anObject->addDBObject ();
/*
$_POST['id_work_week']=1;
$_POST['id_employe']=1;
$_POST['id_project']=2;
$_POST['departement']="Usine";
$_POST['hours']="2";

$typeName = "employe_week_hours";
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
} else if ($typeName == "employe_week_hours"){
	$anObject = new FastechEmployekWeekHours();
	$anObject->setId_state(1);
	$anObject->setId_employe_hour(null);
}

$attributes = $anObject->getObjectAsArrayWithOutMetadata ();

$valuesToBeAdded = $_POST;

foreach ( $valuesToBeAdded as $key => $value ) {
	
	$attributeName = "set" . ucfirst ( $key );
	$anObject->$attributeName ( $value );
}
$anObject->addDBObject ();*/
?>