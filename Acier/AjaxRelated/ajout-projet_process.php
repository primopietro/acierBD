<?php
session_start ();

if (isset ( $_GET ["suffixe"] ) && isset ( $_GET ["debutProjet"] ) && isset ( $_GET ["budget"] )) {

	//require_once '../MVC/Controller/db_workWeek_manager.php';
	$suffixe = htmlspecialchars ( $_GET ["suffixe"] );
	$debutProjet = htmlspecialchars ( $_GET ["debutProjet"] );
	$budget = htmlspecialchars ( $_GET ["budget"] );
	
	echo "success";
	//$aWorkWeek = new WorkWeek ( $aName, $aStartDate );

	
	//postWorkWeekInDatabase ( $aWorkWeek );
	
	//$_SESSION ["work_weeks"] [$aWorkWeek->id_work_week] = $aWorkWeek;

}

?>