<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pks extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('M_pks');
    }

	public function index()
	{
		$this->load->view('pks/pks');
	}
	
	public function create()
	{
		$this->load->view('pks/pks_input_form');
	}
	
	public function create_action()
	{
		$data = array(
			'nm_istansi' => $this->input->post('nm_instansi', TRUE),
			'jns_pks' => $this->input->post('jns_pks', TRUE),
			'des_pks' => $this->input->post('des_pks', TRUE),
			'asal_pks' => $this->input->post('asal_pks', TRUE),
			'r_waktu' => $this->input->post('r_waktu', TRUE),
			'rtm_waktu' => $this->input->post('rtm_waktu', TRUE),
			'rta_waktu' => $this->input->post('rta_waktu', TRUE),
			'pic' => $this->input->post('pic', TRUE)
		);
		$this->M_pks->insert($data);
		redirect(site_url('Pks/list_pks'));
	}

	public function list_pks()
	{
		$this->load->view('pks/pks_list');
	}
	
	public function progress()
	{
		$this->load->view('pks/pks_progress');
	}
		
}
?>
