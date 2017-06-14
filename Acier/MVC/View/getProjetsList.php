<?php
include_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_projects_manager.php';

if(!isset($_SESSION))
session_start();

$aListOfProjects = getAllActiveProjectsInDatabase();

echo "<option value='Choisissez un projet'>Choisissez un projet</option>";
if($aListOfProjects!= null){
	foreach ($aListOfProjects as $aProject) {

		echo "<option ";

		echo " value=" . $aProject->getName() .  ">" . $aProject->getName() ."</option>";

	}
}
$_SESSION['current_page'] = "Projet";
?>