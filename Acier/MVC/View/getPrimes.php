<?php
require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_prime_manager.php';
session_start ();

$aListOfPrimes = getAllActivePrimesInDatabase ();

if ($aListOfPrimes!= null) {
	foreach ( $aListOfPrimes as $aPrime ) {
		$name = $aPrime->getName();
		echo "<tr class='tableHover'>";
		
		echo "<td><form class='editPrime' idPrime='$name'>";
		echo "<input name='name' value='" . $aPrime->getName () . "'> </form></td>";
		
		echo "<td><form class='editPrime' idPrime='$name'> ";
		echo  "<input type='number' name='amount' value='" .$aPrime->getValue () . "'></form></td>";
		echo "</tr>";
	}
}
$_SESSION ['current_page'] = "Departement";
?>