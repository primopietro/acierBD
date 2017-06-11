<?php
session_start ();
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_workWeek_manager.php';
include_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_departement_manager.php';

$aListOfweeks = getAllActiveWorkWeeksInDatabase ();
$aListOfDepartements = getAllActiveDepartementsInDatabase ();

if ($aListOfweeks != null) {
	foreach ( $aListOfweeks as $aWeek ) {
		
		echo "<tr class='cursor tableHover'>";
		echo "<td>" . $aWeek->getName () . "</td>";
		if ($aListOfDepartements != null) {
			foreach ( $aListOfDepartements as $aDepartement ) {
				
				echo "<td>0</td>";
			}
			echo "<td>0</td>";
		}
		echo "</tr>";
	}
	
	echo "<tr><td>Total:</td>";
	if ($aListOfDepartements != null) {
		$i = 1;
		foreach ( $aListOfDepartements as $aDepartement ) {
			echo "<td>calcul" . $i . "</td>";
			$i ++;
		}
	}
	
	echo "<td>0</td></tr><tr><td>Taux:</td>";
	if ($aListOfDepartements != null) {
		$i = 1;
		foreach ( $aListOfDepartements as $aDepartement ) {
			echo "<td>" . $aDepartement->getValue() . "</td>";
		}
	}
	echo "<td></td></tr>";
}
$_SESSION ['current_page'] = "Semaine;"
?>