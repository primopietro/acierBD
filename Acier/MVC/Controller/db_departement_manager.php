<?php
include  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/departement.php';


// Dep section
// Add a new departement into database
function postDepartementInDatabase($aDep) {
	
	$name = htmlspecialchars_decode ( $aDep->getName () );
	$value = htmlspecialchars_decode ( $aDep->getValue () );
	$state = htmlspecialchars_decode ( $aDep->getState () );
	//require_once '../../database_connect.php';
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	$sql = "INSERT INTO `departement` (`name`, `amount`, `id_state` ) 
		 	VALUES ('$name', '$value', '$state' )";
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

function getAllDepartementsInDatabase() {
	
	$result = $conn->query ( "SELECT * FROM departement" );
	
	//require_once '../../database_connect.php';
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($result->num_rows > 0) {
		$departements = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aDepartement = new Departement ( $row ['name'], $row ['amount'] );
			$aDepartement->setState ( $row ['id_state'] );
			$departements [$row ['name']] = $aDepartement;
		}
		$conn->close ();
		return $departements;
	}
	$conn->close ();
	return null;
}

function getAllActiveDepartementsInDatabase() {
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	$result = $conn->query ( "SELECT * FROM departement
							WHERE id_state = 1" );
	
	
	if ($result->num_rows > 0) {
		$departements = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aDepartement = new Departement ( $row ['name'], $row ['amount'] );
			$departements [$row ['name']] = $aDepartement;
			
		}
		$conn->close ();
		return $departements;
	}
	$conn->close ();
	return null;
}

function updateDepartementByName($aNewDep, &$oldDep) {
	
	$newName = $aNewDep->getName ();
	$newAmount = $aNewDep->getValue ();
	$newState = $aNewDep->getState ();
	
	$sql = "UPDATE `departement`
			SET `name` = '$newName',
			SET `amount` = '$newAmount',
 			SET `id_state` = '$newState'
			WHERE `departement`.`name` = '$oldDep->getName()' ";
	
	//require_once '../../database_connect.php';
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		$oldDep = $aNewDep;
	}
	
	$conn->close ();
}
	

?>