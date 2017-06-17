<?php
include 'fastech_employe.php';
class FastechDetailWeek extends FastechModel {
	protected $table_name = 'detail_week';
	protected $primary_key = "id_detail_week";
	private $employe = null;
	protected $id_detail_week = 0;
	protected $id_employe = 0;
	protected $mechanic = 0;
	protected $other = 0;
	protected $total = 0;
	protected $paied = 0;
	protected $regular = 0;
	protected $id_state = 1; // 1 equals active by default
	function __construct() {
		$this->employe = new FastechEmploye ();
	}
	
	/**
	 * id_detail_week
	 * 
	 * @return unkown
	 */
	public function getId_detail_week() {
		return $this->id_detail_week;
	}
	
	/**
	 * id_detail_week
	 * 
	 * @param unkown $id_detail_week        	
	 * @return FastechDetailWeek
	 */
	public function setId_detail_week($id_detail_week) {
		$this->id_detail_week = $id_detail_week;
		return $this;
	}
	
	/**
	 * id_employe
	 * 
	 * @return unkown
	 */
	public function getid_employe() {
		return $this->id_employe;
	}
	
	/**
	 * id_employe
	 * 
	 * @param unkown $id_employe        	
	 * @return FastechDetailWeek
	 */
	public function setid_employe($id_employe) {
		$this->id_employe = $id_employe;
		return $this;
	}
	
	/**
	 * mechanic
	 * 
	 * @return unkown
	 */
	public function getMechanic() {
		return $this->mechanic;
	}
	
	/**
	 * mechanic
	 * 
	 * @param unkown $mechanic        	
	 * @return FastechDetailWeek
	 */
	public function setMechanic($mechanic) {
		$this->mechanic = $mechanic;
		return $this;
	}
	
	/**
	 * other
	 * 
	 * @return unkown
	 */
	public function getOther() {
		return $this->other;
	}
	
	/**
	 * other
	 * 
	 * @param unkown $other        	
	 * @return FastechDetailWeek
	 */
	public function setOther($other) {
		$this->other = $other;
		return $this;
	}
	
	/**
	 * total
	 * 
	 * @return unkown
	 */
	public function getTotal() {
		return $this->total;
	}
	
	/**
	 * total
	 * 
	 * @param unkown $total        	
	 * @return FastechDetailWeek
	 */
	public function setTotal($total) {
		$this->total = $total;
		return $this;
	}
	
	/**
	 * paied
	 * 
	 * @return unkown
	 */
	public function getpaied() {
		return $this->paied;
	}
	
	/**
	 * paied
	 * 
	 * @param unkown $paied        	
	 * @return FastechDetailWeek
	 */
	public function setpaied($paied) {
		$this->paied = $paied;
		return $this;
	}
	
	/**
	 * regular
	 * 
	 * @return unkown
	 */
	public function getRegular() {
		return $this->regular;
	}
	
	/**
	 * regular
	 * 
	 * @param unkown $regular        	
	 * @return FastechDetailWeek
	 */
	public function setRegular($regular) {
		$this->regular = $regular;
		return $this;
	}
	
	/**
	 * id_state
	 * 
	 * @return unkown
	 */
	public function getId_state() {
		return $this->id_state;
	}
	
	/**
	 * id_state
	 * 
	 * @param unkown $id_state        	
	 * @return FastechDetailWeek
	 */
	public function setId_state($id_state) {
		$this->id_state = $id_state;
		return $this;
	}
	public function getSubObjectsFromDB() {
		$this->employe->getObjectFromDB($this->id_employe);
	}

    /**
     * employe
     * @return FastechEmploye
     */
    public function getEmploye(){
        return $this->employe;
    }

    /**
     * employe
     * @param FastechEmploye $employe
     * @return FastechDetailWeek
     */
    public function setEmploye($employe){
        $this->employe = $employe;
        return $this;
    }

}

$aDetailWeek = new FastechDetailWeek ();
$aDetailWeek->getObjectFromDB ( 1 );
$aDetailWeek->getSubObjectsFromDB();
echo "<br><br> NORMAL OBJECT PRINT<br><br>";
print "<pre>";
print_r ( $aDetailWeek );
print "</pre>";
echo "<br><br> NORMAL ARRAY PRINT WITH METADADA<br><br>";
print "<pre>";
print_r ( $aDetailWeek->getObjectAsArrayWithMetadata () );
print "</pre>";
echo "<br><br> NORMAL ARRAY PRINT <strong>WITHOUT</strong> METADADA<br><br>";
print "<pre>";
print_r ( $aDetailWeek->getObjectAsArrayWithOutMetadata () );
print "</pre>";
echo "<br><br> NORMAL EMPLOYE PRINT<br><br>";
print "<pre>";
print_r ($aDetailWeek->getEmploye());
print "</pre>";
echo "<br><br> NORMAL ARRAY EMPLOYE PRINT WITH METADATA<br><br>";
print "<pre>";
print_r ($aDetailWeek->getEmploye()->getObjectAsArrayWithMetadata());
print "</pre>";
echo "<br><br> NORMAL ARRAY EMPLOYE PRINT WITHOUT METADATA<br><br>";
print "<pre>";
print_r ($aDetailWeek->getEmploye()->getObjectAsArrayWithOutMetadata());
print "</pre>";
?>