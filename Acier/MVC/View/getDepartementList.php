<?php
include_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_departement_manager.php';

if(!isset($_SESSION))
session_start();

$aListOfDepartements = getAllActiveDepartementsInDatabase();

if($aListOfDepartements != null){
	foreach ($aListOfDepartements as $aDepartement) {

		echo "<option ";

		echo " value=" . $aDepartement->getName()  .  ">" . $aDepartement->getName() . "</option>";

	}
}
$_SESSION['current_page']="Departement";
?>