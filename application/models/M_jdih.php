<?php
class M_jdih extends CI_Model{
	
	function __construct()
	{
			parent::__construct();
			$this->load->database('default', TRUE);
	}
    
    function insert($data){
        // $this->db->insert('project_pks', $data);
    }
}
?>