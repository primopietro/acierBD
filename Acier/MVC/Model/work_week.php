<?php
class WorkWeek {
	public $id_work_week =0;
	private $beginDay = 3; //Tuesdays (Set up by DEVS)
	private $name = '';
	private $start_date = '';
	private $production_total =0;
	private $state = 1; // 1 equals active by default
	function __construct($aName, $aStartDate) {
		
		$this->name = $aName;
		$this->start_date = $aStartDate;
	}
	function getName() {
		return $this->name;
	}
	function getStartDate() {
		return $this->start_date;
	}
	function getState() {
		return $this->state;
	}
	function getBeginDay(){
		return $this->beginDay;
	}
	function setName($aName) {
		$this->name = $aName;
	}
	function setStartDate($aStartDate) {
		$this->start_date = $aStartDate;
	}
	function setState($aState) {
		$this->state = $aState;
	}
	function setBeginDay($aBeginDay){
		$this->beginDay= $aBeginDay;
	}
	
}
?>