<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jdih extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
    }

	public function index()
	{
		$this->load->view('jdih/jdih');
	}
	
	public function create()
	{
		$this->load->view('jdih/jdih_input_form');
	}
	public function list_jdih()
	{
		$this->load->view('jdih/jdih_list');
	}
	
}
?>
