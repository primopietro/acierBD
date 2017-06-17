<?php
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
session_start ();

// Use switch case for each type based on Get or Post
// $anObject = new FastechEmploye( "", 0 ); could work just as well
$anObject = new FastechDepartement ( "", 0 );

$anObject->getObjectListAsDynamicTable("");

$_SESSION ['current_page'] = "Departement";
?>