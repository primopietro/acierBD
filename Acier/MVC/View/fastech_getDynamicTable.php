<?php
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
session_start ();


//Use switch case for each type based on Get or Post
//$anObject = new FastechEmploye( "", 0 ); could work just as well
$anObject = new FastechDepartement( "", 0 );

$aListOfObjects = $anObject->getListOfActiveBDObjects ();
$type = "Dep";
if ($aListOfObjects != null) {
	foreach ( $aListOfObjects as $anObject ) {
		
		echo "<tr class='tableHover'>";
		foreach ( $anObject as $key => $value ) {
			if ($key != "table_name" && $key != "primary_key") {
			}
			$idDep = $anObject["primary_key"];
			$table_name = $anObject["table_name"];
			echo "<td><form table='" . $table_name . "' class='edit". $type. "' iddep='" . $idDep . " '>";
			echo "<input name='" . $key . "' value='" . $value . "'> </form></td>";
		}
		
		echo "</tr>";
	}
}
$_SESSION ['current_page'] = "Departement";
?>