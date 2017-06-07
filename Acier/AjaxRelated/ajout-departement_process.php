<?php
session_start ();

if (isset ( $_GET ["nom"] ) && isset ( $_GET ["taux"] ) ) {

	//require_once '../MVC/Controller/db_workWeek_manager.php';
	$nom = htmlspecialchars ( $_GET ["nom"] );
	$taux = htmlspecialchars ( $_GET ["taux"] );
	
	echo "success";
	//$aWorkWeek = new WorkWeek ( $aName, $aStartDate );

	
	//postWorkWeekInDatabase ( $aWorkWeek );
	
	//$_SESSION ["work_weeks"] [$aWorkWeek->id_work_week] = $aWorkWeek;

}

?>