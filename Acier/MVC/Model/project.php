<?php
class Project {
	public $id_projet;
	private $name = '';
	private $start_date = '';
	private $budget = '';
	private $state = 1; // 1 equals active by default
	function __construct($aName, $aStartDate, $aBudget) {
		$this->name = $aName;
		$this->start_date = $aStartDate;
		$this->budget = $aBudget;
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
		return $this->state;
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
		$this->state = $aState;
	}
}
?>