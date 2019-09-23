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
	
	function get_by_id($id){
		$query = $this->db->query("SELECT * FROM SKR_Pks WHERE kd_pks = '".$id."'");
		return $query->row();
	}
	
	function get_total_dt(){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks WHERE SKR_Pks.dl_sts = 1 AND SKR_Pks.sls_pks = 0");
		return $query->result();
	}

	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1 AND SKR_Pks.sls_pks = 0".$searchQuery);
		return $query->result();
	}

	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage."* FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1 AND SKR_Pks.sls_pks = 0".$searchQuery." and SKR_Pks.kd_pks NOT IN(
			SELECT TOP ".$baris." SKR_Pks.kd_pks FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1 AND SKR_Pks.sls_pks = 0".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
			order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_kode(){
		$query = $this->db->query('SELECT MAX(kd_pks) AS maxkode FROM SKR_Pks');
		return $query->result();
	}

	function get_total_dt_p(){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1");
		return $query->result();
	}

	function get_total_fl_p($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1 ".$searchQuery);
		return $query->result();
	}
	
	function get_total_ft_p($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage."* FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1 ".$searchQuery." and SKR_Pks.kd_pks NOT IN(
			SELECT TOP ".$baris." SKR_Pks.kd_pks FROM SKR_Pks WHERE 1=1 AND SKR_Pks.dl_sts = 1".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
			order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function getAll(){
		$query = $this->db->query("SELECT * FROM SKR_Pks WHERE dl_sts = 1 AND sls_pks = 0");
		return $query->result();
	}

	function get_t_st1(){
		$query = $this->db->query("SELECT COUNT(prsn_pks) AS total FROM SKR_Pks WHERE dl_sts = 1 AND prsn_pks = '0%'");
		return $query->result();
	}

	function get_t_st2(){
		$query = $this->db->query("SELECT COUNT(prsn_pks) AS total FROM SKR_Pks WHERE dl_sts = 1 AND prsn_pks = '25%'");
		return $query->result();
	}

	function get_t_st3(){
		$query = $this->db->query("SELECT COUNT(prsn_pks) AS total FROM SKR_Pks WHERE dl_sts = 1 AND prsn_pks = '50%'");
		return $query->result();
	}

	function get_t_st4(){
		$query = $this->db->query("SELECT COUNT(prsn_pks) AS total FROM SKR_Pks WHERE dl_sts = 1 AND prsn_pks = '75%'");
		return $query->result();
	}

	function get_t_st5(){
		$query = $this->db->query("SELECT COUNT(prsn_pks) AS total FROM SKR_Pks WHERE dl_sts = 1 AND prsn_pks = '100%'");
		return $query->result();
	}

	function get_g_pks(){
		$query = $this->db->query("SELECT MONTH(dt_cr) as bulan, COUNT(MONTH(dt_cr)) as tgl FROM SKR_Pks WHERE YEAR(dt_cr) = YEAR(GETDATE()) AND SKR_Pks.dl_sts = 1 GROUP BY MONTH(dt_cr)");
		return $query->result();
	}

	function autoins($params = array()){
        $this->db->select("*");
        $this->db->from('pubpng');

        //search by terms
        if(!empty($params['searchTerm'])){
            $this->db->like('vc_n_png', $params['searchTerm']);
        }
        
        $this->db->order_by('vc_n_png', 'asc');
        
        if(array_key_exists("id",$params)){
            $this->db->where('vc_k_png',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
	}
	
	function get_respon(){
		$query = $this->db->query("SELECT MONTH(dt_cr) as bulan, DATEDIFF(day, dt_cr, date_rev) as selisih FROM SKR_Pks WHERE dl_sts = 1 AND YEAR(dt_cr) = YEAR(GETDATE())");;
		return $query->result();
	}

	function get_r_total(){
		$query = $this->db->query("SELECT count(MONTH(dt_cr)) as total FROM SKR_Pks WHERE dl_sts = 1 AND YEAR(dt_cr) = YEAR(GETDATE()) AND MONTH(dt_cr) = MONTH(GETDATE())");
		return $query->result();
	}
}
?>