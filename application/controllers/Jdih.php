<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jdih extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('M_jdih');
    }

	public function index()
	{
		$this->load->view('jdih/jdih');
	}
	
	public function create()
	{
		$this->load->view('jdih/jdih_input_form');
	}

	public function create_action()
	{
		$data = array(
			'r_lingkup' => $this->input->post('r_lingkup', TRUE),
			'jns_prtn' => $this->input->post('jns_prtn', TRUE),
			'th_prtn' => $this->input->post('th_prtn', TRUE),
			'nmr_prtn' => $this->input->post('nmr_prtn', TRUE),
			'nm_prtn' => $this->input->post('nm_prtn', TRUE),
			'sts_prtn' => $this->input->post('sts_prtn', TRUE),
			'strkl' => $this->input->post('strkl', TRUE),

		);
		$this->M_jdih->insert($data);
		$this->load->view('jdih/jdih_list');
	}
	public function list_jdih()
	{
		$this->load->view('jdih/jdih_list');
	}
	
}
?>
