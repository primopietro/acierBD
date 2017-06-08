<?php
session_start ();

if (isset ( $_GET ["nom"] ) && isset ( $_GET ["prenom"] ) ) {

	require_once $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_employees_manager.php';
	$aFamilyName= htmlspecialchars ( $_GET ["nom"] );
	  $aFirstName= htmlspecialchars ( $_GET ["prenom"] );
	
	
	$aEmploye = new Employee( $aFirstName, $aFamilyName);

	postEmployeInDatabase($aEmploye);
	
	
	$_SESSION ["employees"] [$aEmploye->id_employe] = $aEmploye ;

}

?>