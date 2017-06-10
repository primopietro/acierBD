<?php
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_employees_manager.php';
include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_departement_manager.php';

$aListOfEmployees = getAllActiveEmployesInDatabase ();
$aListOfDepartements = getAllActiveDepartementsInDatabase ();

if ($aListOfEmployees != null) {
	foreach ( $aListOfEmployees as $aEmploye ) {
		
		echo "<tr class='cursor tableHover'>";
		echo "<td>" . $aEmploye->id_employe . "</td>";
		echo "<td>" . $aEmploye->getFamilyName () . "</td>";
		echo "<td>" . $aEmploye->getFirstName () . " </td>";
		echo "<td>" . $aEmploye->getHourRate () . " $/heure</td>";
		echo "<td><select>";
		$selected = $aEmploye->departement;
		// include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/View/getDepartementList.php';
		
		if ($aListOfDepartements != null) {
			foreach ( $aListOfDepartements as $aDepartement ) {
				
				echo "<option ";
				if ($selected == $aDepartement->getName ()) {
					echo " selected ";
					
					echo " value=" . $aDepartement->getName () . ">" . $aDepartement->getName () . "</option>";
				}
			}
			
			echo " </select></td>";
			echo "</tr>";
		}
	}
}
?>