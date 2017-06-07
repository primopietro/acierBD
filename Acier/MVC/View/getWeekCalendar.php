<?php
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_workWeek_manager.php';


$aListOfweeks = getAllActiveWorkWeeksInDatabase();

foreach ($aListOfweeks as $aWeek) {
	
	echo "<tr class='cursor tableHover'>";
	echo "<td>" . $aWeek->getName() . "</td>";
	echo "<td>" . $aWeek->getStartDate() . "</td>";
	echo "</tr>";
}
?>