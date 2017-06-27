<?php

if(!isset($_SESSION))
session_start();

$anObject = null;

require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employe_week_hours.php';
$anObject = new FastechEmployekWeekHours();
$anObject->getObjectListAsDynamicTable(true);

$_SESSION['current_page'] = "ongletSemaine";

?>