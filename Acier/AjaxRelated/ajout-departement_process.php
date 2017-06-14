<?php
session_start ();

if (isset ( $_GET ["nom"] ) && isset ( $_GET ["taux"] ) ) {
	
	require_once $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_departement_manager.php';
	$aName = htmlspecialchars ( $_GET ["nom"] );
	$aValue = htmlspecialchars ( $_GET ["taux"] );
	

	
	$aDepartement = new Departement($aName, $aValue);
	
	postDepartementInDatabase($aDepartement);
	$_SESSION["departements"][$aName] = $aDepartement;


}

?>