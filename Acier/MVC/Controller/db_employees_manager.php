<?php
//require_once '../MVC/Model/work_week.php';
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/Employee.php';


function postEmployeInDatabase(&$aEmploye) {
	
	
	$aIdEmploye = htmlspecialchars_decode ( $aEmploye->id_employe );
	$aNameFirstName = htmlspecialchars_decode ( $aEmploye->getFirstName() );
	$aFamilyName= htmlspecialchars_decode ( $aEmploye->getFamilyName() );
	$aHourRate= htmlspecialchars_decode ( $aEmploye->getHourRate() );
	$aDepartement= htmlspecialchars_decode ( $aEmploye->departement );
	$aState = htmlspecialchars_decode ( $aEmploye->getState () );
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	//require_once '../database_connect.php';
	
	$sql = "INSERT INTO `employees` 
			(`id_employe`, `first_name`, `family_name`,`hour_rate`,`departement`,  `id_state`) 
			VALUES ('$aIdEmploye', '$aNameFirstName', '$aFamilyName','$aHourRate','$aDepartement','$aState');";
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

function getAllEmployesInDatabase() {
	
	$result = $conn->query ( "SELECT * FROM employees" );
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($result->num_rows > 0) {
		$Employes = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aEmploye= new Employee( $row ['first_name'], $row ['family_name']);
			$aEmploye->setHourRate($row ['hour_rate']);
			$aEmploye->departement = $row ['departement'] ;
			$aEmploye->id_employe=  $row ['id_employe'] ;
			$Employes[$row ['id_employe']] = $Employes;
		}
		$conn->close ();
		return $Employes;
	}
	$conn->close ();
	return null;
}

function getAllActiveEmployesInDatabase() {
	
	//require_once '../database_connect.php';
	
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	$result = $conn->query ( "SELECT * FROM employees
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
}

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