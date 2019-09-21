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
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih.dl_sts = 1");
		return $query->result();
	}

	function get_total_fl($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE 1=1 AND SKR_Jdih.dl_sts = 1".$searchQuery);
		return $query->result();
	}

	function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage." * FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE 1=1 AND SKR_Jdih.dl_sts = 1".$searchQuery." and SKR_Jdih.kd_jdih NOT IN (
			SELECT TOP ".$baris." SKR_Jdih.kd_jdih FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE 1=1 AND SKR_Jdih.dl_sts = 1".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
			order by ".$columnName." ".$columnSortOrder);
		return $query->result();
	}

	function get_total_dt_jns(){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih_jns WHERE bt_aktif = 1");
		return $query->result();
	}
	
	function get_total_fl_jns($searchQuery){
		$query = $this->db->query("SELECT count(*) as allcount FROM SKR_Jdih_jns WHERE 1=1 AND bt_aktif = 1".$searchQuery);
		return $query->result();
	}

	function get_total_ft_jns($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
		$query = $this->db->query("SELECT TOP ".$rowperpage." * FROM SKR_Jdih_jns WHERE 1=1 AND bt_aktif = 1".$searchQuery." and SKR_Jdih_jns.id_jns NOT IN (
			SELECT TOP ".$baris." SKR_Jdih_jns.id_jns FROM SKR_Jdih_jns WHERE 1=1 AND bt_aktif = 1".$searchQuery." order by ".$columnName." ".$columnSortOrder.")
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

	public function get_no_se($jns){
		$query = $this->db->query("SELECT count(nmr_prtn) as maxkode FROM SKR_Jdih WHERE jns_prtn = '".$jns."' AND nmr_prtn LIKE '%SE%' ");
		return $query->result();
	}

	public function get_jns(){
		$query = $this->db->query("SELECT * FROM SKR_Jdih_jns WHERE bt_aktif = 1");
		return $query->result();
	}

	public function get_no(){
		$query = $this->db->query("SELECT MAX(id_jns) AS maxkode FROM SKR_Jdih_jns");
		return $query->result();
	}
	public function get_by_id_jns($id){
		$query = $this->db->query("SELECT * FROM SKR_Jdih_jns WHERE id_jns = '".$id."'");
		return $query->row();
	}
	public function insert_jns($data){
		$this->db->insert('SKR_Jdih_jns', $data);
	}
	public function update_jns($id, $data){
		$this->db->where('id_jns', $id);
		$this->db->update('SKR_Jdih_jns', $data);
	}

	function autojns($params = array()){
        $this->db->select("*");
        $this->db->from('SKR_Jdih_jns');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        //search by terms
        if(!empty($params['searchTerm'])){
            $this->db->like('nm_jdih_jns', $params['searchTerm']);
        }
        
        $this->db->order_by('nm_jdih_jns', 'asc');
        
        if(array_key_exists("id",$params)){
            $this->db->where('id_jns',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
	}
	
	function autostrk($params = array()){
        $this->db->select("*");
        $this->db->from('pubgugus');
        
        //fetch data by conditions
        // if(array_key_exists("conditions",$params)){
        //     foreach ($params['conditions'] as $key => $value) {
        //         $this->db->where($key,$value);
        //     }
        // }
        
        //search by terms
        if(!empty($params['searchTerm'])){
            $this->db->like('vc_n_gugus', $params['searchTerm']);
        }
        
        $this->db->order_by('vc_n_gugus', 'asc');
        
        if(array_key_exists("id",$params)){
            $this->db->where('vc_k_gugus',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
	}
	
	function get_prtn_baru(){
		$query = $this->db->query("SELECT TOP 5 * FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE dl_sts = 1 ORDER BY date_create desc");
		return $query->result();
	}
	function get_t_jns1(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 1 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns2(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 2 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns3(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 3 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns4(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 4 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns5(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 5 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns6(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 6 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns7(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 7 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns8(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 8 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns9(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 9 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns10(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 10 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_jns11(){
		$query = $this->db->query("SELECT SKR_Jdih_jns.nm_jdih_jns, count(jns_prtn) as total FROM SKR_Jdih JOIN SKR_Jdih_jns ON SKR_Jdih.jns_prtn = SKR_Jdih_jns.id_jns WHERE SKR_Jdih_jns.id_jns = 11 AND SKR_Jdih.dl_sts = 1 GROUP BY SKR_Jdih_jns.nm_jdih_jns");
		return $query->result();
	}
	function get_t_rl1(){
		$query = $this->db->query("SELECT COUNT(r_lingkup) as total FROM SKR_Jdih WHERE SKR_Jdih.dl_sts = 1 AND SKR_Jdih.r_lingkup = 1");
		return $query->result();
	}
	function get_t_rl2(){
		$query = $this->db->query("SELECT COUNT(r_lingkup) as total FROM SKR_Jdih WHERE SKR_Jdih.dl_sts = 1 AND SKR_Jdih.r_lingkup = 2");
		return $query->result();
	}


}
?>