<?php
include 'fastech_model.php';
class FastechUser extends FastechModel {
	protected $table_name = 'users';
	protected $primary_key = "id_user";
	protected $id_user = null;
	protected $username = "";
	protected $password = "";
	function __construct() {
		// Do nothing
	}
	
	/**
	 * username
	 * 
	 * @return String
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 * username
	 * 
	 * @param String $username        	
	 * @return FastechUser
	 */
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	
	/**
	 * password
	 * 
	 * @return String
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 * password
	 * 
	 * @param String $password        	
	 * @return FastechUser
	 */
	public function setPassword($password) {
		$this->password= $password;
		return $this;
	}
	
} 

?>