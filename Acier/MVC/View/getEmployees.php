<?php
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_employees_manager.php';


$aListOfEmployees = getAllActiveEmployesInDatabase();

if($aListOfEmployees!= null){
	foreach ($aListOfEmployees as $aEmploye) {
	
		echo "<tr class='cursor tableHover'>";
		echo "<td>" . $aEmploye->getFamilyName() . "</td>";
		echo "<td>" . $aEmploye->getFirstName() . " </td>";
		echo "</tr>";
	}
}
?>