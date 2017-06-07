<?php
session_start ();

if (isset ( $_GET ["nom"] ) && isset ( $_GET ["prenom"] ) ) {

	//require_once '../MVC/Controller/db_workWeek_manager.php';
	$nom = htmlspecialchars ( $_GET ["nom"] );
	$prenom = htmlspecialchars ( $_GET ["prenom"] );
	
	echo "success";
	//$aWorkWeek = new WorkWeek ( $aName, $aStartDate );

	
	//postWorkWeekInDatabase ( $aWorkWeek );
	
	//$_SESSION ["work_weeks"] [$aWorkWeek->id_work_week] = $aWorkWeek;

}

?>