<?php
require_once'fastech_model.php';

class FastechCCQ extends FastechModel {
	protected $table_name = 'ccq';
	protected $primary_key = "name";
	
	protected $name = '';
	protected $amount = 0;
	protected $id_state = 1; // 1 equals active by default
	
	function __construct() {
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
	function setAmount($anAmount) {
		$this->amount= $anAmount;
	}
	function setid_state($id_state) {
		$this->id_state = $id_state;
	}
}

?>