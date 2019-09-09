<?php
class M_jdih extends CI_Model{
	
	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
    
    function insert($data){
        $this->db->insert('SKR_Jdih', $data);
	}
	
	function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih");
		return $query->result();
	}

	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih WHERE 1=1".$searchQuery);
		return $query->result();
	}

	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage." * FROM SKR_Jdih WHERE 1=1 ".$searchQuery." and SKR_Jdih.kd_jdih NOT IN (
			SELECT TOP ".$baris." SKR_Jdih.kd_jdih FROM SKR_Jdih WHERE 1=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
			order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_kode(){
		$query = $this->db->query('SELECT MAX(kd_jdih) AS maxkode FROM SKR_Jdih');
		return $query->result();
	}
}
?>