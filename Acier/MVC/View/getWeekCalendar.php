<?php
session_start();
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_workWeek_manager.php';


$aListOfweeks = getAllActiveWorkWeeksInDatabase();

if($aListOfweeks != null){
	foreach ($aListOfweeks as $aWeek) {
		$finishDate = date('Y-m-d', strtotime($aWeek->getStartDate(). ' + 5 days'));
		
		echo "<tr class='cursor tableHover'>";
		echo "<td>" . $aWeek->getName() . "</td>";
		echo "<td>" . $aWeek->getStartDate() . " </td>";
		echo "<td>" . $finishDate. "<a href='javascript:void(0)' key='$aWeek->id_work_week' class='float-right disable'>Supprimer</a></td>";
		echo "</tr>";
	}
}
$_SESSION['current_page']="Semaine;"
?>