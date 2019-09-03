<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pks extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
    }

	public function index()
	{
		$this->load->view('pks/pks');
	}
	
	public function create()
	{
		$this->load->view('pks/pks_input_form');
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
