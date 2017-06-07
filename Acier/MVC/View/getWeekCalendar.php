<?php
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_workWeek_manager.php';


$aListOfweeks = getAllActiveWorkWeeksInDatabase();

if($aListOfweeks != null){
	foreach ($aListOfweeks as $aWeek) {
		$finishDate = date('Y-m-d', strtotime($aWeek->getStartDate(). ' + 7 days'));
		
		echo "<tr class='cursor tableHover'>";
		echo "<td>" . $aWeek->getName() . "</td>";
		echo "<td>" . $aWeek->getStartDate() . " <a href='javascript:void(0)' key='$aWeek->id_work_week' class='disable'>Supprimer</a></td>";
		echo "<td>" . $finishDate. "</td>";
		echo "</tr>";
	}
}
?>