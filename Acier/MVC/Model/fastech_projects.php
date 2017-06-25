W<?php
include 'fastech_model.php';

class FastechProject extends FastechModel{
	protected $table_name = 'projects';
	protected $primary_key = "id_project";
	
	
	protected $id_project=0;
	protected $name = ' ';
	protected $start_date = '';
	protected $budget = 0;
	protected $production_total = 0;
	protected $id_state = 1; // 1 equals active by default
	
	function __construct() {
		$this->production_total ="0";
		$this->id_state=1;
	}
	

    /**
     * id_project
     * @return unkown
     */
    public function getId_project(){
        return $this->id_project;
    }

    /**
     * id_project
     * @param unkown $id_project
     * @return FastechProject
     */
    public function setId_project($id_project){
        $this->id_project = $id_project;
        return $this;
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
     * @return FastechProject
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * start_date
     * @return unkown
     */
    public function getStart_date(){
        return $this->start_date;
    }

    /**
     * start_date
     * @param unkown $start_date
     * @return FastechProject
     */
    public function setStart_date($start_date){
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * budget
     * @return unkown
     */
    public function getBudget(){
        return $this->budget;
    }

    /**
     * budget
     * @param unkown $budget
     * @return FastechProject
     */
    public function setBudget($budget){
        $this->budget = $budget;
        return $this;
    }

    /**
     * production_total
     * @return unkown
     */
    public function getProduction_total(){
        return $this->production_total;
    }

    /**
     * production_total
     * @param unkown $production_total
     * @return FastechProject
     */
    public function setProduction_total($production_total){
        $this->production_total = $production_total;
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
     * @return FastechProject
     */
    public function setId_state($id_state){
        $this->id_state = $id_state;
        return $this;
    }

}

?>