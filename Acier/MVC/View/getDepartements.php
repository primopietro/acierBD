<?php
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_departement_manager.php';
session_start ();

$aListOfDepartements = getAllActiveDepartementsInDatabase ();

if ($aListOfDepartements != null) {
	foreach ( $aListOfDepartements as $aDepartement ) {
		$name = $aDepartement->getName();
		echo "<tr class='tableHover'>";
		
		echo "<td><form class='editDep' iddep='$name'>";
		echo "<input name='name' value='" . $aDepartement->getName () . "'> </form></td>";
		
		echo "<td><form class='editDep' iddep='$name'> ";
		echo  "<input type='number' name='amount' value='" .$aDepartement->getValue () . "'></form></td>";
		echo "</tr>";
	}
}
$_SESSION ['current_page'] = "Departement";
?>