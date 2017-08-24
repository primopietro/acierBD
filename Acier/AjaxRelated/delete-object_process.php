<?php

$anObject = null;
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_taux_departement_revient.php';

$anObject = new FastechTauxDepartemenRevient();

$anID = trim(htmlspecialchars ( $_GET ["idItem"] ));
$anID =  str_replace(' ', '&nbsp;', $anID);

$anObject->deleteDBObject($anID);

?>