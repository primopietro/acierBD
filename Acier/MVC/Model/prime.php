<?php
class Prime {
	private $name = '';
	private $value = 0;
	private $state = 1; // 1 equals active by default
	function __construct($aName, $aValue) {
		$this->name = $aName;
		$this->value = $aValue;
	}
	function getName() {
		return $this->name;
	}
	function getValue() {
		return $this->value;
	}
	function getState() {
		return $this->state;
	}
	function setName($aName) {
		$this->name = $aName;
	}
	function setValue($aValue) {
		$this->value = $aValue;
	}
	function setState($aState) {
		$this->state = $aState;
	}
}
?>