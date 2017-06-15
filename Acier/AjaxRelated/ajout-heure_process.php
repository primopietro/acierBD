<?php
session_start ();

if (isset ( $_GET ["employe"] ) && isset ( $_GET ["projet"] ) && isset ( $_GET ["departement"] ) && isset ( $_GET ["nbHeure"] )) {
	if (($_GET ["employe"]) != "Choisissez un employé" && ($_GET ["projet"]) != "Choisissez un projet" && ($_GET ["departement"]) != "Choisissez un département") {
		
		require_once $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Controller/db_employees_week_hours_manager.php';
		$anEmployeeName = htmlspecialchars ( $_GET ["employe"] );
		$aProjectName = htmlspecialchars ( $_GET ["projet"] );
		$aDepartementName = htmlspecialchars ( $_GET ["departement"] );
		$anHour = htmlspecialchars ( $_GET ["nbHeure"] );
		
		
		require_once  $_SERVER["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
		
		$pieces = explode("-", $anEmployeeName);
		$anEmployeeFamilyName = $pieces[0];
		$anEmployeFirstName = $pieces[1];
		$result = $conn->query ( "SELECT * FROM employees
								  WHERE family_name = " . $anEmployeeFamilyName . " AND first_name = " . $anEmployeFirstName);
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$anEmployeeId=  $row ['id_employe'] ;
			}
		}
		
		$result = $conn->query ( "SELECT * FROM projects
								  WHERE name = " . $aProjectName);
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$aProjectId=  $row ['id_project'] ;
			}
		}
		
		
		$conn->close ();
		
		$aEmployeWeekHours = new EmployeWeekHours( $anEmployeeId, $aProjectId);
		$aEmployeWeekHours->departement = $aDepartementName;
		$aEmployeWeekHours->setHours($anHour);
		postEmployeWeekHoursInDatabase($aEmployeWeekHours);
		
		
		$_SESSION ["employe_week_hours"] [$aEmployeWeekHours->id_employe_hour] = $aEmployeWeekHours;
	}
}

?>