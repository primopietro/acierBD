<?php
include 'fastech_departement.php';
class FastechEmploye extends FastechModel {
	protected $table_name = 'employees';
	protected $primary_key = "id_employe";
	protected $id_employe = null;
	protected $first_name = "";
	protected $family_name = "";
	protected $hour_rate = 0;
	protected $departement = "";
	protected $id_state = 1;
	function __construct() {
		// Do nothing
	}
	
	/**
	 * first_name
	 * 
	 * @return String
	 */
	public function getFirst_name() {
		return $this->first_name;
	}
	
	/**
	 * first_name
	 * 
	 * @param String $first_name        	
	 * @return FastechEmploye
	 */
	public function setFirst_name($first_name) {
		$this->first_name = $first_name;
		return $this;
	}
	
	/**
	 * family_name
	 * 
	 * @return String
	 */
	public function getFamily_name() {
		return $this->family_name;
	}
	
	/**
	 * family_name
	 * 
	 * @param String $family_name        	
	 * @return FastechEmploye
	 */
	public function setFamily_name($family_name) {
		$this->family_name = $family_name;
		return $this;
	}
	
	/**
	 * hour_rate
	 * 
	 * @return Double
	 */
	public function getHour_rate() {
		return $this->hour_rate;
	}
	
	/**
	 * hour_rate
	 * 
	 * @param Double $hour_rate        	
	 * @return FastechEmploye
	 */
	public function setHour_rate($hour_rate) {
		$this->hour_rate = $hour_rate;
		return $this;
	}
	
	/**
	 * departement
	 * 
	 * @return String
	 */
	public function getDepartement() {
		return $this->departement;
	}
	
	/**
	 * departement
	 * 
	 * @param String $departement        	
	 * @return FastechEmploye
	 */
	public function setDepartement($departement) {
		$this->departement = $departement;
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
	 * @return FastechEmploye
	 */
	public function setId_state($id_state) {
		$this->id_state = $id_state;
		return $this;
	}
	
	/**
	 * id_employe
	 * 
	 * @return Int
	 */
	public function getId_employe() {
		return $this->id_employe;
	}
	
	/**
	 * id_employe
	 * 
	 * @param Int $id_employe        	
	 * @return FastechEmploye
	 */
	public function setId_employe($id_employe) {
		$this->id_employe = $id_employe;
		return $this;
	}
	
	public function getObjectListAsDynamicTable($showPrimaryKey = true) {
		$aListOfObjects = $this->getListOfActiveBDObjects ();
		if ($aListOfObjects != null) {
			foreach ( $aListOfObjects as $anObject ) {
				
				echo "<tr class=''>";
				foreach ( $anObject as $key => $value ) {
					if ($key != "table_name" && $key != "primary_key" && $key != "id_state") {
						$id_object = $anObject ["primary_key"];
						$table_name = $anObject ["table_name"];
						if($key != "departement"){
							if ($key != "departement") {
								echo "<td><form table='" . $table_name . "' class='edit' idobj='" . $anObject [$id_object] . " '>";
								echo "<input  class='editable'  name='" . $key . "' value='" . $value . "'> </form></td>";
							}
						}else{
							$aDepartement = new FastechDepartement();
							
							echo "<td><form table='" . $table_name . "' class='edit' idobj='" . $anObject [$id_object] . " '>";
							echo "<select class='editable' name='" . $key . "'>";
							$aDepartementName = $anObject ["departement"];
							$aListOfDepartements = $aDepartement->getActiveObjectsAsSelect($aDepartementName);
							echo "</select></form></td>";
						}
						
					}
				}
				
				echo "</tr>";
			}
		}
	}
}

/*
 for($i=0;$i<5;++$i){
 $anEmploye = new FastechEmploye();
 $anEmploye->setFirst_name("This is name $i");
 $anEmploye->setFamily_name("This is family name $i");
 $anEmploye->setDepartement("Usine");
 $anEmploye->setHour_rate(15);
 $anEmploye->addDBObject();
 }
 $employe = new FastechEmploye();
 $employe->getObjectFromDB(1);
 print_r($employe);
 $employes = $employe->getObjectListAsDynamicTable(true);
 echo "<pre>";
 print_r($employes);
 echo "</pre>";
*/
 

?>