<?php
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_projects_manager.php';


$aListOfProjects = getAllActiveProjectsInDatabase();

if($aListOfProjects!= null){
	foreach ($aListOfProjects as $aProject) {
	
		echo "<tr class='cursor tableHover'>";
		echo "<td>" . $aProject->getName() . "</td>";
		echo "<td>" . $aProject->getStartDate() . " </td>";
		echo "<td>" . $aProject->getBudget(). " $</td>";
		echo "<td>" . $aProject->getProductionTotal() . " $</td>";
		echo "</tr>";
	}
}
?>