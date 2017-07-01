<?php
if (! isset ( $_SESSION ))
	session_start ();
$anObject = null;

if (isSet ( $_GET )) {
	
	require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_prime_payement.php';
	
	$anObject = new FastechPrimePayement();
	$anObject->getObjectListAsDynamicTableTableForWeek($_GET['prime'], $_GET['id_payement']);
	
}