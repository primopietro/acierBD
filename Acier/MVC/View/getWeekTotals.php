<?php
if (! isset ( $_SESSION ))
	session_start ();
$anObject = null;

if (isSet ( $_GET )) {
	include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
	$query = "SELECT SUM(ewh.hours) as totalHours
			FROM employe_week_hours ewh
			JOIN projects p on p.id_project = ewh.id_project
			WHERE ewh.id_work_week = '" . $_GET['weekId'] . "' AND p.bool_autre = 1";
	$result = $conn->query ($query);
	if ($result->num_rows > 0) {
		while ( $row = $result->fetch_assoc () ) {
			echo "<td>" . $row['totalHours'] . "</td>";
		}
	}
}