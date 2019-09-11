<?php
class M_jdih extends CI_Model{
	
	public $table = 'SKR_Jdih';
	public $id = 'kd_jdih';

	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
    
    function insert($data){
        $this->db->insert('SKR_Jdih', $data);
	}

	function update($id, $data){
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	function get_by_id($id){
		$query = $this->db->query("SELECT * FROM SKR_Jdih WHERE kd_jdih = '".$id."'");
		return $query->row();
	}
	
	function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih WHERE SKR_Jdih.dl_sts = 1");
		return $query->result();
	}

	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih WHERE 1=1 AND SKR_Jdih.dl_sts = 1".$searchQuery);
		return $query->result();
	}

	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage." * FROM SKR_Jdih WHERE 1=1 AND SKR_Jdih.dl_sts = 1".$searchQuery." and SKR_Jdih.kd_jdih NOT IN (
			SELECT TOP ".$baris." SKR_Jdih.kd_jdih FROM SKR_Jdih WHERE 1=1 AND SKR_Jdih.dl_sts = 1".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
			order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_kode(){
		$query = $this->db->query('SELECT MAX(kd_jdih) AS maxkode FROM SKR_Jdih');
		return $query->result();
	}

	public function download($id){
		$query = $this->db->get_where('SKR_Jdih',array('kd_jdih'=>$id));
		return $query->row_array();
	}
}
?>