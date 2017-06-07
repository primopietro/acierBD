<?php
//require_once '../MVC/Model/work_week.php';
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/work_week.php';

// Dep section
// Add a new work week into database, set lastest ID as local ID 
function postWorkWeekInDatabase(&$aWorkWeek) {
	
	$aName = htmlspecialchars_decode ( $aWorkWeek->getName () );
	$aStartDate= htmlspecialchars_decode ( $aWorkWeek->getStartDate() );
	$aBeginDay= htmlspecialchars_decode ( $aWorkWeek->getBeginDay() );
	$aState = htmlspecialchars_decode ( $aWorkWeek->getState () );
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	//require_once '../database_connect.php';
	
	$sql = "INSERT INTO `work_weeks` 
			(`id_work_week`, `name`, `begin_date`, `begin_day`, `id_state`) 
			VALUES (NULL, '$aName', '$aStartDate', '$aBeginDay', '$aState');";
	if (! $result = $conn->query ( $sql )) {
		// Oh no! The query failed.
		exit ();
	}
	else{
		if($aWorkWeek->id_work_week == 0){
			$sql = "SELECT MAX(id_work_week) as id_work_week FROM work_weeks;";
			$result = $conn->query ($sql);
			while ( $row = $result->fetch_assoc () ) {
				$aWorkWeek->id_work_week = $row ['id_work_week'];
			}
			echo "success";
		}
		else{
			echo "fail";
		}
	}
	
	$conn->close ();
}

function getAllWorkWeeksInDatabase() {
	
	$result = $conn->query ( "SELECT * FROM work_weeks" );
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($result->num_rows > 0) {
		$workWeeks = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aWorkWeek= new WorkWeek( $row ['name'], $row ['begin_date'] );
			$aWorkWeek->setState( $row ['id_state'] );
			$aWorkWeek->setBeginDay( $row ['begin_day'] );
			$aWorkWeek->id_work_week =  $row ['id_work_week'] ;
			$workWeeks[$row ['id_work_week']] = $workWeeks;
		}
		return $workWeeks;
	}
	$conn->close ();
	return null;
}

function getAllActiveWorkWeeksInDatabase() {
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	$result = $conn->query ( "SELECT * FROM work_weeks
							  WHERE id_state = 1" );
	
	
	
	if ($result->num_rows > 0) {
		$workWeeks = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aWorkWeek= new WorkWeek( $row ['name'], $row ['begin_date'] );
			
			$aWorkWeek->setBeginDay( $row ['begin_day'] );
			$aWorkWeek->id_work_week =  $row ['id_work_week'] ;
			$workWeeks[$row ['id_work_week']] = $aWorkWeek;
		}
		
		return $workWeeks;
	}
	$conn->close ();
	return null;
}

//IDS must be the same in order for it to work
function updateWorkWeekByID($aNewWorkWeek, &$oldWorkWeek) {
	
	$newName = $aNewWorkWeek->getName ();
	$newBeginDate= $aNewWorkWeek->getStartDate();
	$newBeginDay= $aNewWorkWeek->getBeginDay();
	$newState = $aNewWorkWeek->getState ();
	
	$sql = "UPDATE `work_weeks`
			SET `name` = '$newName',
			SET `begin_date` = '$newBeginDate',
			SET `begin_day` = '$newBeginDay',
 			SET `id_state` = '$newState'
 			WHERE `work_weeks`.`id_work_week` = '$oldDep->id_work_week' ";
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		$oldWorkWeek= $aNewWorkWeek;
		echo "success";
	}else{
		echo "fail";
	}
	
	$conn->close ();
}
	

function removeWorkWeekByID($id) {
	$sql = "UPDATE `work_weeks`
	SET `id_state` = '2'
	WHERE `work_weeks`.`id_work_week` = '$id' ";
	
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