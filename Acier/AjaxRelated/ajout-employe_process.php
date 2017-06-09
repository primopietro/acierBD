<?php
session_start ();

if (isset ( $_GET ["nom"] ) && isset ( $_GET ["prenom"] ) ) {

	require_once $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_employees_manager.php';
	$aFamilyName= htmlspecialchars ( $_GET ["nom"] );
	  $aFirstName= htmlspecialchars ( $_GET ["prenom"] );
	 $aDepartement= htmlspecialchars ( $_GET ["departement"] );
	 
	
	$aEmploye = new Employee( $aFirstName, $aFamilyName);
	$aEmploye->departement = $aDepartement;
	$aEmploye->setHourRate(0); // to be changed
	postEmployeInDatabase($aEmploye);
	
	
	$_SESSION ["employees"] [$aEmploye->id_employe] = $aEmploye ;

}

?>