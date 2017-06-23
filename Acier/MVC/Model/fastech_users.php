<?php
include 'fastech_model.php';
class FastechUser extends FastechModel {
	protected $table_name = 'users';
	protected $primary_key = "id_user";
	protected $id_user = 0;
	protected $username = "";
	protected $password = "";
	protected $id_state =1;
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
	


    /**
     * id_user
     * @return unkown
     */
    public function getId_user(){
        return $this->id_user;
    }

    /**
     * id_user
     * @param unkown $id_user
     * @return FastechUser
     */
    public function setId_user($id_user){
        $this->id_user = $id_user;
        return $this;
    }


    /**
     * id_state
     * @return unkown
     */
    public function getId_state(){
        return $this->id_state;
    }

    /**
     * id_state
     * @param unkown $id_state
     * @return FastechUser
     */
    public function setId_state($id_state){
        $this->id_state = $id_state;
        return $this;
    }

} 

?>