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
		$data = array(
			
		);
		$this->load->view('pks/pks_list');
	}
	
	public function progress()
	{
		$this->load->view('pks/pks_progress');
	}

	function tbl_list(){
		## Read value
		$draw = $_POST['draw'];
		$baris = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
		$searchQuery = " ";
		if($searchValue != ''){
		$searchQuery = " and (
		colom like '%".$searchValue."%' or 
		colom like '%".$searchValue."%' or 
		colom like '%".$searchValue."%' or 
		colom like '%".$searchValue."%' or 
		colom like'%".$searchValue."%' or
		colom like'%".$searchValue."%' or
		colom like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_pks->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_monitor->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		$cek = '<a href="perawatan/cek/'.$row->kd_inv.'" class="btn btn-success btn-circle">
		<i class="fas fa-check"></i>
		</a>';
		
		$button = '
		<a href="Pks/read/'.$row->kd_inv.'" class="btn btn-info btn-circle">
		<i class="fas fa-info-circle"></i>
		</a>
		<a href="Pks/update/'.$row->kd_inv.'" class="btn btn-warning btn-circle">
        <i class="fas fa-edit"></i>
        </a>
		<a href="Pks/delete/'.$row->kd_inv.'" class="btn btn-danger btn-circle">
		<i class="fas fa-trash"></i>
		</a>
		';

		$data[] = array( 
			"action"=>$button
		);
		}

		## Response
		$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
		);

		echo json_encode($response);
	}
		
}
?>
