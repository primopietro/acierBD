<?php
include  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/prime.php';


// Dep section
// Add a new prime into database
function postPrimeInDatabase($aPrime) {
	
	$name = htmlspecialchars_decode ( $aPrime->getName () );
	$value = htmlspecialchars_decode ( $aPrime->getValue () );
	$state = htmlspecialchars_decode ( $aPrime->getState () );
	//require_once '../../database_connect.php';
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	$sql = "INSERT INTO `prime` (`name`, `amount`, `id_state` ) 
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

function getAllPrimesInDatabase() {
	
	$result = $conn->query ( "SELECT * FROM prime" );
	
	//require_once '../../database_connect.php';
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($result->num_rows > 0) {
		$primes = array ();
		while ( $row = $result->fetch_assoc () ) {
			$aPrime = new Prime ( $row ['name'], $row ['amount'] );
			$aPrime->setState ( $row ['id_state'] );
			$primes[$row ['name']] = $aPrime;
		}
		$conn->close ();
		return $primes;
	}
	$conn->close ();
	return null;
}

function getAllActivePrimesInDatabase() {
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	$result = $conn->query ( "SELECT * FROM prime
							WHERE id_state = 1" );
	
	
	if ($result->num_rows > 0) {
		$primes= array ();
		while ( $row = $result->fetch_assoc () ) {
			$aPrime= new Prime ( $row ['name'], $row ['amount'] );
			$primes[$row ['name']] = $aPrime;
			
		}
		$conn->close ();
		return $primes;
	}
	$conn->close ();
	return null;
}

function updatePrimeByName($aNewPrime, &$oldPrime) {
	
	$newName = $aNewPrime->getName ();
	$newAmount = $aNewPrime->getValue ();
	$newState = $aNewPrime->getState ();
	
	$sql = "UPDATE `prime`
			SET `name` = '$newName',
			SET `amount` = '$newAmount',
 			SET `id_state` = '$newState'
			WHERE `prime`.`name` = '$oldPrime->getName()' ";
	
	//require_once '../../database_connect.php';
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		$oldPrime= $aNewDep;
	}
	
	$conn->close ();
}
	
function updatePrimeDynamically($aFieldName, $aValue, $anID) {
	
	$sql = "UPDATE `prime`
	SET `$aFieldName` = '$aValue'
	WHERE `prime`.`name` = '$anID' ";
	
	//require_once '../../database_connect.php';
	
	include $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	
	if ($conn->query ( $sql ) === TRUE) {
		echo "success";
	}else{
		echo "fail";
	}
	
	$conn->close ();
}
?>