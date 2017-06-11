<?php
session_start ();

if (isset ( $_GET ["idEmploye"] ) && isset ( $_GET ["nom"] ) && isset ( $_GET ["prenom"] ) && isset ( $_GET ["departement"] ) && isset ( $_GET ["taux"] ) ) {

	require_once $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_employees_manager.php';
	$anId = htmlspecialchars ( $_GET ["idEmploye"] );
	$aFamilyName= htmlspecialchars ( $_GET ["nom"] );
	 $aFirstName= htmlspecialchars ( $_GET ["prenom"] );
	 $aDepartement= htmlspecialchars ( $_GET ["departement"] );
	 $anHourlyRate= htmlspecialchars ( $_GET ["taux"] );
	 
	
	$aEmploye = new Employee( $aFirstName, $aFamilyName);
	$aEmploye->id_employe = $anId;
	$aEmploye->departement = $aDepartement;
	$aEmploye->setHourRate( $anHourlyRate); // to be changed
	postEmployeInDatabase($aEmploye);
	
	$_SESSION ["employees"] [$aEmploye->id_employe] = $aEmploye ;

}

?>