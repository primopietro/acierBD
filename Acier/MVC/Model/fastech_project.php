<?php
include 'fastech_model.php';

class FastechProject extends FastechModel{
	protected $table_name = 'projects';
	protected $primary_key = "id_project";
	
	
	protected $id_project=0;
	protected $name = '';
	protected $start_date = '';
	protected $budget = '';
	protected $production_total = 0;
	protected $id_state = 1; // 1 equals active by default
	
	function __construct() {
		$this->production_total ="0";
	}
	
	function  getProductionTotal(){
		return $this->production_total;
	}
	
	function setProductionTotal($aProductionTotal){
		$this->production_total = $aProductionTotal;
	}
	
	function getName() {
		return $this->name;
	}
	function getStartDate() {
		return $this->start_date;
	}
	function getBudget() {
		return $this->budget;
	}
	function getState() {
		return $this->id_state;
	}
	function setName($aName) {
		$this->name = $aName;
	}
	function setStartDate($aStartDate) {
		$this->start_date = $aStartDate;
	}
	function setBudget($aBudget) {
		$this->budget = $aBudget;
	}
	function setState($aState) {
		$this->id_state= $aState;
	}
}

?>