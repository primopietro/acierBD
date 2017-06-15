<?php
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/employe_week_hours.php';


function postEmployeWeekHoursInDatabase(&$aEmployeWeekHours) {
	
	
	$aIdEmploye = htmlspecialchars_decode ( $aEmployeWeekHours->getEmployeeId() );
	$aIdProject = htmlspecialchars_decode ( $aEmployeWeekHours->getProjectId() );
	$aDepartement = htmlspecialchars_decode ( $aEmployeWeekHours->departement );
	$hours= htmlspecialchars_decode ( $aEmployeWeekHours->getHours() );
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	//require_once '../database_connect.php';
	
	$sql = "INSERT INTO `employe_week_hours` 
			(`id_employe_hour`, `id_employee`, `id_project`,`departement`,`hours`) 
			VALUES (NULL, '$aIdEmploye', '$aIdProject','$aDepartement','$hours');";
	if (! $result = $conn->query ( $sql )) {
		// Oh no! The query failed.
		echo "fail";
		exit ();
	}
	else{
		echo "success";

	}
	
	$conn->close ();
}

function getAllEmployesWeekHoursInDatabase() {
	
	$result = $conn->query ( "SELECT * FROM employe_week_hours" );
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($result->num_rows > 0) {
		$EmployesWeekHours = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aEmployeWeekHours = new EmployeWeekHours( $row ['id_employee'], $row ['id_project']);
			$aEmployeWeekHours->id_employe_hour =  $row ['id_employe_hour'] ;
			$aEmployeWeekHours->departement = $row ['departement'];
			$aEmployeWeekHours->setHours($row ['hours']);
			
			$EmployesWeekHours[$row ['id_employe_hour']] = $aEmployeWeekHours;
		}
		$conn->close ();
		return $EmployesWeekHours;
	}
	$conn->close ();
	return null;
}

/*function getAllActiveEmployesInDatabase() {
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	$result = $conn->query ( "SELECT * FROM employe_week_hours
							  WHERE id_state = 1" );
	
	
	
	if ($result->num_rows > 0) {
		$Employes = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aEmploye= new Employee( $row ['first_name'], $row ['family_name'] );
			$aEmploye->setHourRate($row ['hour_rate']);
			$aEmploye->departement = $row ['departement'] ;
			$aEmploye->id_employe=  $row ['id_employe'] ;
			$Employes[$row ['id_employe']] = $aEmploye;
		}
		
		$conn->close ();
		return $Employes;
	}
	$conn->close ();
	return null;
}*/

//IDS must be the same in order for it to work
function updateEmployeByID($aNewEmploye, &$oldEmploye) {
	
	$newFirstName = $aNewEmploye->getFirstName ();
	$newFamilyName= $aNewEmploye->getFamilyDate();
	$newHourRate= $aNewEmploye->getHourRate();
	$newDepartement= $aNewEmploye->departement;
	$newState = $aNewEmploye->getState ();
	
	$sql = "UPDATE `employees`
			SET `first_name` = '$newFirstName',
			SET `family_name` = '$newFamilyName',
			SET `hour_rate` = '$newHourRate',
			SET `departement` = '$newDepartement',
			SET `id_state` = '$newBeginDay',
			WHERE `employees`.`id_employe` = '$oldEmploye->id_employe' ";
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		$oldEmploye= $aNewEmploye;
		echo "success";
	}else{
		echo "fail";
	}
	
	$conn->close ();
}
	
function updateEmployeDynamically($aField,$aValue, $anID) {
	
	$sql = "UPDATE `employees`
	SET `$aField` = '$aValue'
	WHERE `employees`.`id_employe` = '$anID' ";
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		echo "success";
	}else{
		echo "fail";
	}
	
	$conn->close ();
}

function removeEmployeByID($id) {
	$sql = "UPDATE `employees`
	SET `id_state` = '2'
	WHERE `employees`.`id_employe` = '$id' ";
	
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