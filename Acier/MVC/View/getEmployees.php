<?php
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_employees_manager.php';
include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_departement_manager.php';

$aListOfEmployees = getAllActiveEmployesInDatabase ();
$aListOfDepartements = getAllActiveDepartementsInDatabase ();

if ($aListOfEmployees != null) {
	foreach ( $aListOfEmployees as $aEmploye ) {
		
		echo "<tr class='tableHover editEmploye' >";
		echo "<td >" . $aEmploye->id_employe . "</td>";
		
		echo "<td ><form class='editEmp' idemp='$aEmploye->id_employe'>";
		echo "<input name='family_name' value='" . $aEmploye->getFamilyName () . "'></form></td>";
		
		echo "<td><form class='editEmp' idemp='$aEmploye->id_employe'>";
		echo "<input name='first_name' value='". $aEmploye->getFirstName () . "'> </form></td>";
		
		echo "<td ><form class='editEmp' idemp='$aEmploye->id_employe'>";
		echo "<input name='hour_rate' type='number' value='". $aEmploye->getHourRate () . "'></form></td>";
		
		echo "<td ><form class='editEmp' idemp='$aEmploye->id_employe'><select id='employeDepartement' class='form-control selectTable' name='departement'>";
		$selected = $aEmploye->departement;
			
		if ($aListOfDepartements != null) {
			foreach ( $aListOfDepartements as $aDepartement ) {
				echo "<option ";
				if ($selected == $aDepartement->getName ()) {
					echo " selected ";
				}
				
				echo " value=" . $aDepartement->getName () . ">" . $aDepartement->getName () . "</option>";
			}
			
			echo " </select></form></td>";
			echo "</tr>";
		}
	}
}
?>