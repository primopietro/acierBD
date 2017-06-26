<?php
include 'fastech_model.php';
class FastechEmployekWeekHours extends FastechModel {
	
	protected $table_name = 'employe_week_hours';
	protected $primary_key = "id_employe_hour";
	
	protected $id_employe_hour=0;
	protected $id_work_week=0;
	protected $id_employe = 0;
	protected $id_project = 0;
	protected $departement = '';
	protected $hours = 0;
	protected $id_state = 1; // 1 equals active by default
	function __construct() {
		
	}
	
	

    /**
     * id_employe_hour
     * @return Int
     */
    public function getId_employe_hour(){
    	return $this->id_employe_hour;
    }

    /**
     * id_employe_hour
     * @param Int $id_employe_hour
     * @return FastechEmployekWeekHours
     */
    public function setId_employe_hour($id_employe_hour){
    	$this->id_employe_hour = $id_employe_hour;
        return $this;
    }
    
    /**
     * id_work_week
     * @return Int
     */
    public function getId_work_week(){
    	return $this->id_work_week;
    }
    
    /**
     * id_work_week
     * @param Int $id_work_week
     * @return FastechEmployekWeekHours
     */
    public function setId_work_week($id_work_week){
    	$this->id_work_week= $id_work_week;
    	return $this;
    }

    /**
     * id_employe
     * @return Int
     */
    public function getId_employe(){
    	return $this->id_employe;
    }

    /**
     * id_employe
     * @param Int $id_employe
     * @return FastechEmployekWeekHours
     */
    public function setId_employe($id_employe){
    	$this->id_employe = $id_employe;
        return $this;
    }
    
    /**
     * id_project
     * @return Int
     */
    public function getId_project(){
    	return $this->id_project;
    }
    
    /**
     * id_project
     * @param Int $id_project
     * @return FastechEmployekWeekHours
     */
    public function setId_project($id_project){
    	$this->id_project = $id_project;
    	return $this;
    }

    /**
     * departement
     * @return String
     */
    public function getDepartement(){
    	return $this->departement;
    }

    /**
     * departement
     * @param String $departement
     * @return FastechEmployekWeekHours
     */
    public function setDepartement($departement){
    	$this->departement = $departement;
        return $this;
    }

    /**
     * hours
     * @return float
     */
    public function getHours(){
    	return $this->hours;
    }

    /**
     * hours
     * @param float $hours
     * @return FastechEmployekWeekHours
     */
    public function setHours($hours){
    	$this->hours= $hours;
        return $this;
    }

    /**
     * id_state
     * @return Int
     */
    public function getId_state(){
        return $this->id_state;
    }

    /**
     * id_state
     * @param Int $id_state
     * @return FastechEmployekWeekHours
     */
    public function setId_state($id_state){
        $this->id_state = $id_state;
        return $this;
    }

}

/*for($i=2;$i<5;++$i){
 $anEmploye = new FastechEmployekWeekHours();
 $anEmploye->setId_employe_hour(null);
 $anEmploye->setId_work_week($i);
 $anEmploye->setId_employe($i);
 $anEmploye->setId_project($i);
 $anEmploye->setDepartement("test");
 $test = $i + 20;
 $anEmploye->setHours($test);
 $anEmploye->addDBObject();
 }
 $employe = new FastechEmployekWeekHours();
 $employe->getObjectFromDB(1);
 print_r($employe);
 $employes = $employe->getObjectListAsDynamicTable(true);
 echo "<pre>";
 print_r($employes);
 echo "</pre>";
*/
?>