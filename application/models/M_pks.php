<?php
class M_pks extends CI_Model{
	
	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
    
    function insert($data){
        $this->db->insert('SKR_Pks', $data);
	}
	
	function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks");
		return $query->result();
	}

	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks WHERE 1=1".$searchQuery);
		return $query->result();
	}

	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage."* FROM SKR_Pks WHERE 1=1 ".$searchQuery." and SKR_Pks.kd_pks NOT IN(
			SELECT TOP ".$baris." SKR_Pks.kd_pks FROM SKR_Pks WHERE 1=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
			order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}
	
}
?>