<?php
//require_once '../MVC/Model/work_week.php';
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/project.php';

// Dep section
// Add a new work week into database, set lastest ID as local ID 
function postProjectInDatabase(&$aProject) {
	
	$aName = htmlspecialchars_decode ( $aProject->getName () );
	$aStartDate= htmlspecialchars_decode ( $aProject->getStartDate() );
	$aBudget= htmlspecialchars_decode ( $aProject->getBudget() );
	$aProductionTotal =  htmlspecialchars_decode ( $aProject->getProductionTotal());
	
	$aState = htmlspecialchars_decode ( $aProject->getState () );
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	//require_once '../database_connect.php';
	
	$sql = "INSERT INTO `projects` 
			(`id_project`, `name`,`start_date`,`production_total`,`budget`,`id_state`) 
			VALUES (NULL, '$aName', '$aStartDate', '$aProductionTotal', '$aBudget','$aState');";
	if (! $result = $conn->query ( $sql )) {
		// Oh no! The query failed.
		echo "fail";
		exit ();
	}
	else{	
		echo "success";
	/* unknown bug
		if($aProject->id_project ==  0){
			$sql = "SELECT MAX(id_project) as id_project FROM projects;";
			$result = $conn->query ($sql);
			while ( $row = $result->fetch_assoc () ) {
				$aProject->id_project = $row ['id_project'];
			}
		
		}*/
	}
	
	$conn->close ();
}

function getAllProjectsInDatabase() {
	
	$result = $conn->query ( "SELECT * FROM projects" );
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($result->num_rows > 0) {
		$projects = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aProject= new Project( $row ['name'], $row ['start_date'], $row ['budget']);
			$aProject->setProductionTotal($row ['production_total']);
			$aProject->setState($row ['id_state']);
			$aProject->id_project =  $row ['id_project'] ;
			$projects[$row ['id_project']] = $aProject;
		}
		$conn->close ();
		return $projects;
	}
	$conn->close ();
	return null;
}

function getAllActiveProjectsInDatabase() {
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	$result = $conn->query ( "SELECT * FROM projects
							  WHERE id_state = 1" );
	
	if ($result->num_rows > 0) {
		$projects = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aProject= new Project( $row ['name'], $row ['start_date'], $row ['budget'],$row ['production_total']);
		
			$aProject->id_project =  $row ['id_project'] ;
			$projects[$row ['id_project']] = $aProject;
		}
		
		return $projects;
	}
	$conn->close ();
	return null;
}

//IDS must be the same in order for it to work
function updateProjectByID($aNewProject, &$oldProject) {
	
	$newName = $aNewProject->getName ();
	$newBeginDate= $aNewProject->getStartDate();
	$newProductionTotal= $aNewProject->getProductionTotal();
	$newBudget= $aNewProject->getBudget();
	$newState = $aNewProject->getState ();
	
	$sql = "UPDATE `projects`
			SET `name` = '$newName',
			SET `start_date` = '$newBeginDate',
			SET `production_total` = '$newProductionTotal',
			SET `budget` = '$newBudget',
 			SET `id_state` = '$newState'
 			WHERE `projects`.`id_project` = '$oldProject->id_project' ";
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		$oldProject= $aNewProject;
		echo "success";
	}else{
		echo "fail";
	}
	
	$conn->close ();
}
	

function removeProjectByID($id) {
	$sql = "UPDATE `projects`
	SET `id_state` = '2'
	WHERE `projects`.`id_projet` = '$id' ";
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		return "success";
	}else{
		return"fail";
	}
	
	$conn->close ();
}

	
	
	

?>