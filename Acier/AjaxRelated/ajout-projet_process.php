<?php
session_start ();

if (isset ( $_GET ["suffixe"] ) && isset ( $_GET ["debutProjet"] ) && isset ( $_GET ["budget"] )) {
	
	require_once $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_projects_manager.php';
	$aName = htmlspecialchars ( $_GET ["suffixe"] );
	$aStartDate = htmlspecialchars ( $_GET ["debutProjet"] );
	$aBudget = htmlspecialchars ( $_GET ["budget"] );
	
	//$aName ="name";
	//$aStartDate = "2000-01-01";
	//$aBudget = 3;
	
	$aProject = new Project ( $aName, $aStartDate, $aBudget);
	postProjectInDatabase($aProject);
	
	$_SESSION ["projects"] [$aProject->id_projet] = $aProject;
}

?>