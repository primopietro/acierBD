<?php
include 'fastech_model.php';

class FastechDepartement extends FastechModel {
	protected $table_name = 'departement';
	protected $primary_key = "name";
	
	protected $name = '';
	protected $amount = 0;
	protected $id_state = 1; // 1 equals active by default
	
	function __construct($aName, $anAmount) {
		$this->name = $aName;
		$this->amount= $anAmount;
	}
	function getName() {
		return $this->name;
	}
	function getAmount() {
		return $this->amount;
	}
	function getid_state() {
		return $this->id_state;
	}
	function setName($aName) {
		$this->name = $aName;
	}
	function setValue($anAmount) {
		$this->amount= $anAmount;
	}
	function setid_state($id_state) {
		$this->id_state = $id_state;
	}
}

?>