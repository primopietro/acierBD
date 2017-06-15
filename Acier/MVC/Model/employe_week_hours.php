<?php

include employee.php;
include project.php;
include departement.php;

class EmployeWeekHours {
	public $id_employe_hour = 0;
	public $departement ="";
	private $id_employee = 0;
	private $id_project = 0;
	private $hours = 0;
	
	function __construct($anEmployeId, $aProjectId) {
		$id_employee= $anEmployeId;
		$id_project= $aProjectId;
	}
	
	/**
	 * id_employe
	 * @return int
	 */
	public function getEmployeeId(){
		return $this->id_employe;
	}
	
	/**
	 * id_employe
	 * @param int $id
	 * @return EmployeWeekHours
	 */
	public function setEmployeeId($id){
		$this->id_employee = $id;
		return $this;
	}
	
	/**
	 * id_project
	 * @return int
	 */
	public function getProjectId(){
		return $this->id_project;
	}
	
	/**
	 * id_project
	 * @param int $id
	 * @return EmployeWeekHours
	 */
	public function setProjectId($id){
		$this->id_project = $id;
		return $this;
	}
	
	/**
	 * id_departement
	 * @return int
	 */
	public function getDepartementId(){
		return $this->id_departement;
	}
	
	/**
	 * id_departement
	 * @param int $id
	 * @return EmployeWeekHours
	 */
	public function setDepartementId($id){
		$this->id_departement = $id;
		return $this;
	}
	
	
    /**
     * hours
     * @return double
     */
    public function getHours(){
    	return $this->hours;
    }

    /**
     * hours
     * @param double $hours
     * @return EmployeWeekHours
     */
    public function setHours($hours){
    	$this->hours = $hours;
        return $this;
    }

}
?>