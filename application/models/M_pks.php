<?php
class M_pks extends CI_Model{
	
	public $table = 'SKR_Pks';
	public $id = 'kd_pks';

	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
    
    function insert($data){
        $this->db->insert('SKR_Pks', $data);
	}

	function update($id, $data){
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}
	
	function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks WHERE SKR_Pks.dl_sts = 1");
		return $query->result();
	}

	function get_by_id($id){
		$query = $this->db->query("SELECT * FROM SKR_Pks WHERE kd_pks = '".$id."'");
		return $query->row();
	}

	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1".$searchQuery);
		return $query->result();
	}

	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage."* FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1".$searchQuery." and SKR_Pks.kd_pks NOT IN(
			SELECT TOP ".$baris." SKR_Pks.kd_pks FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
			order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_kode(){
		$query = $this->db->query('SELECT MAX(kd_pks) AS maxkode FROM SKR_Pks');
		return $query->result();
	}
	
}
?>