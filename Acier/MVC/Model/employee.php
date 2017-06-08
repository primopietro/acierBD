<?php
class Employee{
	public $id_employe = 0;
	private $first_name ='';
	private $family_name ='';
	private $state = 1; //1 equals active by default
	
	function __construct($aFirstName, $aFamilyName)
	{
		$this->first_name= $aFirstName;
		$this->family_name=$aFamilyName;
	}
	
	function getFirstName(){
		return $this->first_name;
	}
	
	function getFamilyName(){
		return $this->family_name;
	}

	function getState(){
		return $this->state;
	}
	
	function setFirstName($aFirstName){
		$this->name = $aFirstName;
	}
	
	function setFamilyName($aFamilyName){
		$this->value = $aFamilyName;
	}
	
	function setState($aState){
		$this->state= $aState;
	}
	
}
?>