<?php
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$style="table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
} 

thead,tfoot{
 background-color:#323232;
color:white;
}
";


$style = "<style>" . $style . "</style>";

$tableName = $_GET["objectName"];


switch ($tableName) {
	case "printPrime":
		require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_prime.php';
		$anObject = new FastechPrime();
		break;
	case "printEmploye":
		require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employees.php';
		$anObject = new FastechEmploye();
		break;
	case "printProject":
		require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_projects.php';
		$anObject = new FastechProject();
		break;
	case "printDepartement":
		require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
		$anObject = new FastechDepartement();
		break;
	case "printPrimeCCQ":
		require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_ccq.php';
		$anObject = new FastechCCQ();
		break;
}


if($tableName== "ongletPrime"){
	
} else if($tableName == "ongletSemaine"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_work_weeks.php';
	$anObject = new FastechWorkWeek();
	
} else if($tableName == "ongletEmploye"){
	
} else if($tableName == "ongletProjet"){
	
} else if($tableName == "ongletDepartement"){
	
} else if($tableName == "ongletCompte"){
	require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_users.php';
	$anObject = new FastechUser();
}


$table = $anObject->getObjectListAsStaticTableString();
$table= "<table>" . $table. "</table>";


$dompdf->loadHtml($style . $table);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();