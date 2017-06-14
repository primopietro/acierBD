<?php
session_start ();

if (isset ( $_GET ["nom"] ) && isset ( $_GET ["taux"] ) ) {
	
	require_once $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_prime_manager.php';
	$aName = htmlspecialchars ( $_GET ["nom"] );
	$aValue = htmlspecialchars ( $_GET ["taux"] );
	

	
	$aPrime = new Prime($aName, $aValue);
	
	postPrimeInDatabase($aPrime);
	$_SESSION["primes"][$aName] = $aPrime;


}

?>