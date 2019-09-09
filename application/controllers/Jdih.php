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
		$kd_jdih = $this->kode();
		$data = array(
			'kd_jdih' => $this->kode(),
			'r_lingkup' => $this->input->post('r_lingkup', TRUE),
			'jns_prtn' => $this->input->post('jns_prtn', TRUE),
			'th_prtn' => $this->input->post('th_prtn', TRUE),
			'nmr_prtn' => $this->input->post('nmr_prtn', TRUE),
			'nm_prtn' => $this->input->post('nm_prtn', TRUE),
			'sts_prtn' => $this->input->post('sts_prtn', TRUE),
			'stru_prtn' => $this->input->post('strkl', TRUE),
			'nm_doc_prtn' => $kd_jdih
		);
		$this->do_upload();
		// $this->M_jdih->insert($data);
		$this->load->view('jdih/jdih_list');
	}
	public function list_jdih()
	{
		$this->load->view('jdih/jdih_list');
	}
	
	public function do_upload()
	{$config = array(
		'upload_path' => "uploads/",
		'allowed_types' => "pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
		//'max_height' => "768",
		//'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('data'))
		{
		$data = array('upload_data' => $this->upload->data());
		echo 'sukses';
		}
		else
		{
		$error = array('error' => $this->upload->display_errors());
		echo 'gagal';
		}
	}

	function kode(){
        $kode = $this->M_jdih->get_kode();
        foreach($kode as $row){
            $data = $row->maxkode;
        }

        $kd_jdih = $data;
        $noUrut = (int) substr($kd_jdih, 4, 6);
        $noUrut++;
        $char = "JDIH";
        $kodebaru = $char.sprintf("%06s", $noUrut);
        return $kodebaru;
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
		kd_jdih like '%".$searchValue."%' or 
		r_lingkup like '%".$searchValue."%' or 
		th_prtn like '%".$searchValue."%' or 
		nmr_prtn like '%".$searchValue."%' or 
		nm_prtn like'%".$searchValue."%' or
		stru_prtn like'%".$searchValue."%' or
		nm_doc_prtn like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_jdih->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_jdih->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_jdih->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		$cek = '<a href="perawatan/cek/'.$row->kd_jdih.'" class="btn btn-success btn-circle">
		<i class="fas fa-check"></i>
		</a>';
		
		$button = '
		<a href="Jdih/proses/'.$row->kd_jdih.'" class="btn btn-success btn-circle">
		<i class="fa fa-check"></i>
		</a>
		<a href="Jdih/read/'.$row->kd_jdih.'" class="btn btn-info btn-circle ">
		<i class="fa fa-info"></i>
		</a>
		<a href="Jdih/update/'.$row->kd_jdih.'" class="btn btn-warning btn-circle">
        <i class="fa fa-edit"></i>
        </a>
		<a href="Jdih/delete/'.$row->kd_jdih.'" class="btn btn-danger btn-circle">
		<i class="fa fa-trash"></i>
		</a>
		';
		
		$rl = $row->r_lingkup;
		if($rl == 1){
			$r_lingkup = 'Nasional';
		}else if($rl == 2){
			$r_lingkup = 'Internal RS';
		}else{
			$r_lingkup = '';
		}

		$jp = $row->jns_prtn;
		if($jp == 1){
			$jns_prtn = 'Undang-Undang';
		}else if($jp == 2){
			$jns_prtn = 'Peraturan Pemerintah';
		}else if($jp == 3){
			$jns_prtn = 'Perpres';
		}else if($jp == 4){
			$jns_prtn = 'Permenkes';
		}else if($jp == 5){
			$jns_prtn = 'Kepmenkes';
		}else if($jp == 6){
			$jns_prtn = 'Keppres';
		}else if($jp == 7){
			$jns_prtn = 'Inpres';
		}else if($jp == 8){
			$jns_prtn = 'Perdir';
		}else if($jp == 9){
			$jns_prtn = 'SK';
		}else if($jp == 10){
			$jns_prtn = 'SE';
		}else{
			$jns_prtn = '';
		}

		$sp = $row->sts_prtn;
		if($sp == 1){
			$sts_prtn = 'Berlaku';
		}else if($sp == 2){
			$sts_prtn = 'Tidak Berlaku';
		}else{
			$sts_prtn ='';
		}

		$data[] = array( 
			"r_lingkup" => $r_lingkup,
			"jns_prtn" => $jns_prtn,
			"th_prtn" => $row->th_prtn,
			"nmr_prtn" => $row->nmr_prtn,
			"nm_prtn" => $row->nm_prtn,
			"sts_prtn" => $sts_prtn,
			"stru_prtn" => $row->stru_prtn,
			"nm_doc_prtn" => $row->nm_doc_prtn,
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
