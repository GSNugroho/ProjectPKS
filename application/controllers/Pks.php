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
			'nm_instansi' => $this->input->post('nm_instansi', TRUE),
			'jns_pks' => $this->input->post('jns_pks', TRUE),
			'des_pks' => $this->input->post('des_pks', TRUE),
			'asal_pks' => $this->input->post('asal_pks', TRUE),
			// 'r_waktu' => $this->input->post('r_waktu', TRUE),
			'tgl_mulai' => $this->input->post('rtm_waktu', TRUE),
			'tgl_akhir' => $this->input->post('rta_waktu', TRUE),
			'pic_pks' => $this->input->post('pic', TRUE)
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
		kd_pks like '%".$searchValue."%' or 
		nm_instansi like '%".$searchValue."%' or 
		jns_pks like '%".$searchValue."%' or 
		des_pks like '%".$searchValue."%' or 
		asal_pks like'%".$searchValue."%' or
		tgl_mulai like'%".$searchValue."%' or
		pic_pks like'%".$searchValue."%' or
		tgl_akhir like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_pks->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_pks->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_pks->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		$cek = '<a href="perawatan/cek/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		<i class="fas fa-check"></i>
		</a>';
		
		$button = '
		<a href="Pks/proses/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		<i class="fa fa-check"></i>
		</a>
		<a href="Pks/read/'.$row->kd_pks.'" class="btn btn-info btn-circle ">
		<i class="fa fa-info"></i>
		</a>
		<a href="Pks/update/'.$row->kd_pks.'" class="btn btn-warning btn-circle">
        <i class="fa fa-edit"></i>
        </a>
		<a href="Pks/delete/'.$row->kd_pks.'" class="btn btn-danger btn-circle">
		<i class="fa fa-trash"></i>
		</a>
		';
		
		$j_p = $row->jns_pks;
		if($j_p == 1){
			$jns_pks = 'Manajerial';
		}else if($j_p == 2){
			$jns_pks = 'Medis';
		}else{
			$jns_pks = '';
		}

		$data[] = array( 
			"nm_instansi" => $row->nm_instansi,
			"jns_pks" => $jns_pks,
			"des_pks" => $row->des_pks,
			"asal_pks" => $row->asal_pks,
			"tgl_mulai" => date('d-m-Y', strtotime($row->tgl_mulai)),
			"tgl_akhir" => date('d-m-Y', strtotime($row->tgl_akhir)),
			"pic_pks" => $row->pic_pks,
			"action" => $button
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
