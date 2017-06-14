<?php
include employee.php;
class WeekDetais {
	public $id_work_details =0;
	private $employees;
	private $mechanic = 0;
	private $other =0;
	private $paied =0;
	private $regular =0;
	private $total= 0; 
	
	function __construct() {
		$employees = array();
	}


	public function addEmploye($employe){
		$this->employees[$employe->id_employe] = $employe;
	}
	public function removeEmploye($employe){
		$this->employees[$employe->id_employe] = null;
	}
	

    /**
     * mechanic
     * @return double
     */
    public function getMechanic(){
        return $this->mechanic;
    }

    /**
     * mechanic
     * @param double $mechanic
     * @return WeekDetais
     */
    public function setMechanic($mechanic){
        $this->mechanic = $mechanic;
        return $this;
    }

    /**
     * other
     * @return double
     */
    public function getOther(){
        return $this->other;
    }

    /**
     * other
     * @param double $other
     * @return WeekDetais
     */
    public function setOther($other){
        $this->other = $other;
        return $this;
    }

    /**
     * paied
     * @return double
     */
    public function getPaied(){
        return $this->paied;
    }

    /**
     * paied
     * @param double $paied
     * @return WeekDetais
     */
    public function setPaied($paied){
        $this->paied = $paied;
        return $this;
    }

    /**
     * regular
     * @return double
     */
    public function getRegular(){
        return $this->regular;
    }

    /**
     * regular
     * @param double $regular
     * @return WeekDetais
     */
    public function setRegular($regular){
        $this->regular = $regular;
        return $this;
    }

    /**
     * total
     * @return double
     */
    public function getTotal(){
        return $this->total;
    }

    /**
     * total
     * @param double $total
     * @return WeekDetais
     */
    public function setTotal($total){
        $this->total = $total;
        return $this;
    }

}
?>