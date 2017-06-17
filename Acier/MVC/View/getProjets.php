<?php
require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_project.php';


$anObject = new FastechProject( "","", 0 );

$anObject->getObjectListAsStaticTable("");

?>