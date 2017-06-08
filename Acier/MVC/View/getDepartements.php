<?php
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_departement_manager.php';
session_start();

$aListOfDepartements = getAllActiveDepartementsInDatabase();

if($aListOfDepartements!= null){
	foreach ($aListOfDepartements as $aDepartement) {
		echo "<tr class='cursor tableHover'>";
		echo "<td>" . $aDepartement->getName() . "</td>";
		echo "<td>" . $aDepartement->getValue() . " $</td>";
		echo "</tr>";
	}
}
$_SESSION['current_page']="Departement";
?>