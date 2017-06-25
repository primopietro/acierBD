<?php
include 'fastech_model.php';

class FastechDepartement extends FastechModel {
	protected $table_name = 'departement';
	protected $primary_key = "name";
	
	protected $name = '';
	protected $amount = 0;
	protected $id_state = 1; // 1 equals active by default
	
	function __construct() {
	}

    /**
     * name
     * @return unkown
     */
    public function getName(){
        return $this->name;
    }

    /**
     * name
     * @param unkown $name
     * @return FastechDepartement
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * amount
     * @return unkown
     */
    public function getAmount(){
        return $this->amount;
    }

    /**
     * amount
     * @param unkown $amount
     * @return FastechDepartement
     */
    public function setAmount($amount){
        $this->amount = $amount;
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
     * @return FastechDepartement
     */
    public function setId_state($id_state){
        $this->id_state = $id_state;
        return $this;
    }

}

?>