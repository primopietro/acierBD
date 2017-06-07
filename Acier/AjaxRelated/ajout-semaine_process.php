<?php
session_start ();

if (isset ( $_GET ["suffixe"] ) && isset ( $_GET ["debut"] ) ) {

	require_once '../MVC/Controller/db_workWeek_manager.php';
	$aName = htmlspecialchars ( $_GET ["suffixe"] );
	$aStartDate = htmlspecialchars ( $_GET ["debut"] );
	
	$aWorkWeek = new WorkWeek ( $aName, $aStartDate );

	
	postWorkWeekInDatabase ( $aWorkWeek );
	
	$_SESSION ["work_weeks"] [$aWorkWeek->id_work_week] = $aWorkWeek;

}

?>