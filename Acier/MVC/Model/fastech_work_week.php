<?php
include 'fastech_model.php';
class FastechWorkWeek extends FastechModel {
	
	protected $table_name = 'work_weeks';
	protected $primary_key = "id_work_week";
	
	protected $id_work_week =0;
	protected $begin_day = 3; //Tuesdays (Set up by DEVS)
	protected $name = '';
	protected $begin_date = '';
	protected $id_state = 1; // 1 equals active by default
	function __construct($aName, $aStartDate) {
		
		$this->name = $aName;
		$this->begin_date= $aStartDate;
	}
	
	

    /**
     * id_work_week
     * @return Int
     */
    public function getId_work_week(){
        return $this->id_work_week;
    }

    /**
     * id_work_week
     * @param Int $id_work_week
     * @return FastechWorkWeek
     */
    public function setId_work_week($id_work_week){
        $this->id_work_week = $id_work_week;
        return $this;
    }

    /**
     * beginDay
     * @return Int
     */
    public function getBeginDay(){
        return $this->beginDay;
    }

    /**
     * beginDay
     * @param Int $beginDay
     * @return FastechWorkWeek
     */
    public function setBeginDay($beginDay){
    	$this->begin_day= $beginDay;
        return $this;
    }

    /**
     * name
     * @return String
     */
    public function getName(){
        return $this->name;
    }

    /**
     * name
     * @param String $name
     * @return FastechWorkWeek
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * begin_date
     * @return Date
     */
    public function getBegin_date(){
        return $this->begin_date;
    }

    /**
     * begin_date
     * @param Date $begin_date
     * @return FastechWorkWeek
     */
    public function setBegin_date($begin_date){
        $this->begin_date = $begin_date;
        return $this;
    }

    /**
     * id_state
     * @return Int
     */
    public function getId_state(){
        return $this->id_state;
    }

    /**
     * id_state
     * @param Int $id_state
     * @return FastechWorkWeek
     */
    public function setId_state($id_state){
        $this->id_state = $id_state;
        return $this;
    }

}

/*
$aWorkWeek = new FastechWorkWeek("ALLO", "2017-02-02");
$aWorkWeek->addDBObject();
*/
?>