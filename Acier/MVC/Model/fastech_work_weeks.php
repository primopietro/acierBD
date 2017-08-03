<?php
require_once 'fastech_model.php';
class FastechWorkWeek extends FastechModel {
	protected $table_name = 'work_weeks';
	protected $primary_key = "id_work_week";
	protected $id_work_week = 0;
	protected $begin_day = 3; // Tuesdays (Set up by DEVS)
	protected $name = '';
	protected $begin_date = '';
	protected $id_state = 1; // 1 equals active by default
	function __construct() {
	}
	
	/**
	 * id_work_week
	 *
	 * @return Int
	 */
	public function getId_work_week() {
		return $this->id_work_week;
	}
	
	/**
	 * id_work_week
	 *
	 * @param Int $id_work_week        	
	 * @return FastechWorkWeek
	 */
	public function setId_work_week($id_work_week) {
		$this->id_work_week = $id_work_week;
		return $this;
	}
	
	/**
	 * beginDay
	 *
	 * @return Int
	 */
	public function getBeginDay() {
		return $this->beginDay;
	}
	
	/**
	 * beginDay
	 *
	 * @param Int $beginDay        	
	 * @return FastechWorkWeek
	 */
	public function setBeginDay($beginDay) {
		$this->begin_day = $beginDay;
		return $this;
	}
	
	/**
	 * name
	 *
	 * @return String
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * name
	 *
	 * @param String $name        	
	 * @return FastechWorkWeek
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * begin_date
	 *
	 * @return Date
	 */
	public function getBegin_date() {
		return $this->begin_date;
	}
	
	/**
	 * begin_date
	 *
	 * @param Date $begin_date        	
	 * @return FastechWorkWeek
	 */
	public function setBegin_date($begin_date) {
		$this->begin_date = $begin_date;
		return $this;
	}
	
	/**
	 * id_state
	 *
	 * @return Int
	 */
	public function getId_state() {
		return $this->id_state;
	}
	
	/**
	 * id_state
	 *
	 * @param Int $id_state        	
	 * @return FastechWorkWeek
	 */
	public function setId_state($id_state) {
		$this->id_state = $id_state;
		return $this;
	}
	public function getListOfActiveBDObjects() {
		include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
		
		$internalAttributes = get_object_vars ( $this );
		
		$sql = "SELECT * FROM `" . $this->table_name . "` WHERE id_state = 1 ORDER BY `begin_date` DESC";
		$result = $conn->query ( $sql );
		
		if ($result->num_rows > 0) {
			$fastechObjects = array ();
			while ( $row = $result->fetch_assoc () ) {
				$anObject = Array ();
				$anObject ["primary_key"] = $this->primary_key;
				$anObject ["table_name"] = $this->table_name;
				foreach ( $row as $aRowName => $aValue ) {
					if ($aRowName != "begin_day") {
						$anObject [$aRowName] = $aValue;
						if ($aRowName == "begin_date") {
							$anObject ["payable"] = date ( 'Y-m-d', strtotime ( $aValue . " + 4 days" ) );
							echo $anObject ["payable"];
						}
					}
				}
				$fastechObjects [$row [$this->primary_key]] = $anObject;
			}
			
			$conn->close ();
			return $fastechObjects;
		}
		$conn->close ();
		return null;
	}
	public function getObjectListAsDynamicTable($showPrimaryKey = true) {
		$aListOfObjects = $this->getListOfActiveBDObjects ();
		if ($aListOfObjects != null) {
			foreach ( $aListOfObjects as $anObject ) {
				
				echo "<tr class='tableHover'>";
				foreach ( $anObject as $key => $value ) {
					if ($key != "table_name" && $key != "primary_key" && $key != "id_state") {
						$id_object = $anObject ["primary_key"];
						$table_name = $anObject ["table_name"];
						
						if ($key != "id_work_week") {
							echo "<td><form table='" . $table_name . "' class='edit' idobj='" . $anObject [$id_object] . " '>";
							echo "<input  class='editable'  name='" . $key . "' value='" . $value . "'> </form></td>";
						} else {
							echo "<td style='display:none'><form table='" . $table_name . "' class='edit' idobj='" . $anObject [$id_object] . " '>";
							echo "<input  class='editable'  name='" . $key . "' value='" . $value . "'> </form></td>";
						}
					}
				}
				
				echo "</tr>";
			}
		}
	}
	function getActiveObjectsAsSelectSpecific($startDate) {
		include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_employe_week_hours.php';
		
		$anEmployeWeekHours = new FastechEmployekWeekHours ();
		
		$aListOfObjects = $anEmployeWeekHours->getWeeksAfterDate ( "'" . $startDate . "'" );
		if ($aListOfObjects != null) {
			foreach ( $aListOfObjects as $anObject ) {
				echo "<option class='editable' value='" . $anObject [$this->primary_key] . "'>" . $anObject ["name"] . "</option>";
			}
		}
	}
	function getPrixRevientAsDynamicTable($dateBegin, $dateEnd) {
		include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/MVC/Model/fastech_departement.php';
		include $_SERVER ["DOCUMENT_ROOT"] . '/AcierBD/Acier/database_connect.php';
		
		$tempArrayResponse = array();
		$compteurTotal = 0;
		 $aDep = new FastechDepartement ();
		$aListOfDeps = $aDep->getListOfActiveBDObjects ();
		
		
		foreach ( $aListOfDeps as $anObject ) {
			$aName = $anObject ['name'];
			$query = "SELECT d.name as depName, SUM(hours) as hoursTotal, d.amount *SUM(hours) as valueTotal
				FROM employe_week_hours ewh
				JOIN work_weeks ww on ww.id_work_week  = ewh.id_work_week
				JOIN departement d on ewh.departement = d.name
				WHERE id_project =1 AND  d.name = '".$aName."'
				AND ww.begin_date > '".$dateBegin."' AND ww.begin_date  < '".$dateEnd."'";
			$result = $conn->query ( $query);
			if ($result->num_rows > 0) {
				while ( $row = $result->fetch_assoc () ) {
					$tempArrayResponse[$row['depName']]['hoursTotal']  = $row['hoursTotal'];
					$tempArrayResponse[$row['depName']]['valueTotal']  = $row['valueTotal'];
					$compteurTotal+= $row['valueTotal'];
				}
			}
		}
		return $tempArrayResponse;
	}
}


  $aWorkWeek = new FastechWorkWeek();
 $temp =  $aWorkWeek->getPrixRevientAsDynamicTable('2017-06-17','2017-07-17');
  echo "<pre>";
  print_r ($temp);
  echo "</pre>";

?>