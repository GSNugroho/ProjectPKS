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
		$data = array(
			'prtn' => $this->M_jdih->get_prtn_baru(),
			'jns_1' => $this->M_jdih->get_t_jns1(),
			'jns_2' => $this->M_jdih->get_t_jns2(),
			'jns_3' => $this->M_jdih->get_t_jns3(),
			'jns_4' => $this->M_jdih->get_t_jns4(),
			'jns_5' => $this->M_jdih->get_t_jns5(),
			'jns_6' => $this->M_jdih->get_t_jns6(),
			'jns_7' => $this->M_jdih->get_t_jns7(),
			'jns_8' => $this->M_jdih->get_t_jns8(),
			'jns_9' => $this->M_jdih->get_t_jns9(),
			'jns_10' => $this->M_jdih->get_t_jns10(),
			'jns_11' => $this->M_jdih->get_t_jns11(),
			'r_l1' => $this->M_jdih->get_t_rl1(),
			'r_l2' => $this->M_jdih->get_t_rl2(),
		);
		$this->load->view('jdih/jdih_db', $data);
	}
	
	public function create()
	{
		$data = array(
			'dd_jns' => $this->M_jdih->get_jns()
		);
		$this->load->view('jdih/jdih_input_form', $data);
	}

	public function create_action()
	{
		$kd_jdih = $this->kode();
		$dl_sts = 1;
		$data = array(
			'kd_jdih' => $this->kode(),
			'r_lingkup' => $this->input->post('r_lingkup', TRUE),
			'jns_prtn' => $this->input->post('id_jns_prtn', TRUE),
			'th_prtn' => $this->input->post('th_prtn', TRUE),
			'nmr_prtn' => $this->input->post('nmr_prtn', TRUE),
			'nm_prtn' => $this->input->post('nm_prtn', TRUE),
			'sts_prtn' => $this->input->post('sts_prtn', TRUE),
			'stru_prtn' => $this->input->post('strkl', TRUE),
			'date_create' => date('Y-m-d'),
			'nm_doc_prtn' => $kd_jdih,
			'dl_sts' => $dl_sts
		);
		$this->do_upload();
		$this->M_jdih->insert($data);
		redirect('Jdih/list_jdih');
	}

	public function update($id){
		$row = $this->M_jdih->get_by_id($id);

		if($row){
			$data = array(
				'kd_jdih' => set_value('kd_jdih', $row->kd_jdih),
				'r_lingkup' => set_value('r_lingkup', $row->r_lingkup),
				'jns_prtn' => set_value('jns_prtn', $row->jns_prtn),
				'th_prtn' => set_value('th_prtn', $row->th_prtn),
				'nmr_prtn' => set_value('nmr_prtn', $row->nmr_prtn),
				'nm_prtn' => set_value('nm_prtn', $row->nm_prtn),
				'sts_prtn' => set_value('sts_prtn', $row->sts_prtn),
				'stru_prtn' => set_value('stru_prtn', $row->stru_prtn),
				'nm_doc_prtn' => set_value('nm_doc_prtn', $row->nm_doc_prtn)
			);
			$this->load->view('jdih/jdih_edit_form', $data);
		}
	}

	public function update_action(){
		$data = array(
			'r_lingkup' => $this->input->post('r_lingkup', TRUE),
			'jns_prtn' => $this->input->post('jns_prtn', TRUE),
			'th_prtn' => $this->input->post('th_prtn', TRUE),
			'nmr_prtn' => $this->input->post('nmr_prtn', TRUE),
			'nm_prtn' => $this->input->post('nm_prtn', TRUE),
			'sts_prtn' => $this->input->post('sts_prtn', TRUE),
			'stru_prtn' => $this->input->post('stru_prtn', TRUE)
		);
		$this->M_jdih->update($this->input->post('kd_jdih'), $data);
		redirect(base_url('jdih/list_jdih'));
	}

	public function read($id){
		$row = $this->M_jdih->get_by_id($id);

		if($row){
			$rl = $row->r_lingkup;
		if($rl == 1){
			$r_lingkup = 'Nasional';
		}else if($rl == 2){
			$r_lingkup = 'Internal RS';
		}else{
			$r_lingkup = '';
		}

		$sp = $row->sts_prtn;
		if($sp == 1){
			$sts_prtn = 'Berlaku';
		}else if($sp == 2){
			$sts_prtn = 'Tidak Berlaku';
		}else{
			$sts_prtn ='';
		}
			$data = array(
				'kd_jdih' => set_value('kd_jdih', $row->kd_jdih),
				'r_lingkup' => $r_lingkup,
				'jns_prtn' => set_value('jns_prtn', $row->jns_prtn),
				'th_prtn' => set_value('th_prtn', $row->th_prtn),
				'nmr_prtn' => set_value('nmr_prtn', $row->nmr_prtn),
				'nm_prtn' => set_value('nm_prtn', $row->nm_prtn),
				'sts_prtn' => $sts_prtn,
				'stru_prtn' => set_value('stru_prtn', $row->stru_prtn),
				'nm_doc_prtn' => set_value('nm_doc_prtn', $row->nm_doc_prtn)
			);

			
		$this->load->view('jdih/jdih_read', $data);
		}
	}

	public function delete($id){
		$row = $this->M_jdih->get_by_id($id);
		$dl_sts = 0;

		if($row){
			$data = array(
				'dl_sts' => $dl_sts
			);
			$this->M_jdih->update($id, $data);
			redirect(base_url('Jdih/list_jdih'));
		}
	}
	public function list_jdih()
	{
		$this->load->view('jdih/jdih_list');
	}
	public function daftar_prtn(){
		$this->load->view('jdih/jdih_daftar');
	}
	
	public function do_upload()
	{
		$this->load->helper('security');
		$name = $this->kode().'.pdf';
		$en_name = do_hash($name, 'md5');
		
		$config = array(
		'upload_path' => "uploads/",
		'file_name' => $en_name,
		'allowed_types' => "pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('data'))
		{
		// $data = array('upload_data' => $this->upload->data());
		echo 'sukses';
		
		}
		else
		{
		// $error = array('error' => $this->upload->display_errors());
		echo 'gagal';
		
		}
	}

	public function download($id){
		$this->load->helper('download');
		$this->load->helper('security');

		$row = $this->M_jdih->get_by_id($id);
		if($row){
			$nm_prtn = $row->nm_prtn;
		}

		$e_name = $id.'.pdf';
		$en_name = do_hash($e_name, 'md5');

		if($this->uri->segment(3))
		{	
		    $data   = file_get_contents('uploads/'.$en_name.'.pdf');
		}
		// $name   = $this->uri->segment(3);
		$name = $nm_prtn.'.pdf';
		force_download($name, $data);

		// force_download('uploads/'.$id,NULL);
	}

	public function read_pdf($id){
		$this->load->helper('download');
		$this->load->helper('security');

		$row = $this->M_jdih->get_by_id($id);
		if($row){
			$nm_prtn = $row->nm_prtn;
		}

		$e_name = $id.'.pdf';
		$en_name = do_hash($e_name, 'md5');
		$data = array('en_name' => $en_name);
		$this->load->view('jdih/jdih_read_pdf', $data);
	}

	public function jns_prtn(){
		$this->load->view('jns_jdih/jns_jdih_list');
	}
	public function create_jns_prtn(){
		$this->load->view('jns_jdih/jns_jdih_input');
	}
	public function create_jns_prtn_action(){
		$nomor = $this->M_jdih->get_no();
		foreach($nomor as $row){
			$dt = $row->maxkode;
		}
		$no = $dt;
		$no++;

		$aktif = 1;
		$data = array(
			'id_jns' => $no,
			'nm_jdih_jns' => $this->input->post('jns_prtn', TRUE),
			'bt_aktif' =>$aktif
		);

		$this->M_jdih->insert_jns($data);
		$this->load->view('jns_jdih/jns_jdih_list');
	}
	public function update_jns_prtn($id){
		$row = $this->M_jdih->get_by_id_jns($id);

		if($row){
			$data = array(
				'id_jns' => set_value('id_jns', $row->id_jns),
				'jns_prtn' => set_value('nm_jdih_jns', $row->nm_jdih_jns),
			);
			$this->load->view('jns_jdih/jns_jdih_edit', $data);
		}
	}
	public function update_jns_prtn_action(){
		$data = array(
			'nm_jdih_jns' => $this->input->post('jns_prtn', TRUE)
		);
		$this->M_jdih->update_jns($this->input->post('id_jns', TRUE), $data);
		$this->load->view('jns_jdih/jns_jdih_list');
	}
	public function delete_jns_prtn($id){
		$row = $this->M_jdih->get_by_id_jns($id);

		$aktif = 0;
		if($row){
			$data = array(
				'bt_aktif' => $aktif
			);
		}
		$this->M_jdih->update_jns($id, $data);
		$this->load->view('jns_jdih/jns_jdih_list', $data);
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

	function nomor_peraturan($jns_prtn){
		if($jns_prtn == 10){
			$kode = $this->M_jdih->get_no_se($jns_prtn);
			foreach($kode as $row){
				$data = $row->maxkode();
			}

			$nmr_prtn = $data;
			$noUrut = (int) substr($nmr_prtn, 0,3);
			$noUrut++;
			$char1 = "SE";
			$char2 = date('Y');
			$char3 = "RSPW";
			$nmr_br = $noUrut.'/'.$char1.'/'.$char3.'/'.$char2;
			return $nmr_br;

		}
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
		 
		r_lingkup like '%".$searchValue."%' or 
		nm_jdih_jns like '%".$searchValue."%' or 
		th_prtn like '%".$searchValue."%' or 
		nmr_prtn like '%".$searchValue."%' or 
		nm_prtn like'%".$searchValue."%' or
		stru_prtn like'%".$searchValue."% 
		' ) ";
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
		<a href="read/'.$row->kd_jdih.'" class="btn btn-info btn-circle ">
		<i class="fa fa-info"></i>
		</a>
		<a href="update/'.$row->kd_jdih.'" class="btn btn-warning btn-circle">
        <i class="fa fa-edit"></i>
        </a>
		<a href="delete/'.$row->kd_jdih.'" class="btn btn-danger btn-circle">
		<i class="fa fa-trash"></i>
		</a>
		';
		$pdf = '
		<a href="read_pdf/'.$row->kd_jdih.'" target="_blank">
		<i class="fa fa-file-pdf-o"></i>
		'.$row->nm_prtn.'
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
			"jns_prtn" => $row->nm_jdih_jns,
			"th_prtn" => $row->th_prtn,
			"nmr_prtn" => $row->nmr_prtn,
			"nm_prtn" => $row->nm_prtn,
			"stru_prtn" => $row->stru_prtn,
			"nm_doc_prtn" => $pdf,
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

	function tbl_jns_prtn(){
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
		nm_jns_jdih like '%".$searchValue."%
		' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_jdih->get_total_dt_jns();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_jdih->get_total_fl_jns($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_jdih->get_total_ft_jns($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		
		$button = '
		<a href="update_jns_prtn/'.$row->id_jns.'" class="btn btn-warning btn-circle">
        <i class="fa fa-edit"></i>
        </a>
		<a href="delete_jns_prtn/'.$row->id_jns.'" class="btn btn-danger btn-circle">
		<i class="fa fa-trash"></i>
		</a>
		';
		
		$data[] = array( 
			"nm_jdih_jns" => $row->nm_jdih_jns,
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

	function autojenis() {
        $returnData = array();
        
        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        $conditions['conditions']['bt_aktif'] = '1';
        $skillData = $this->M_jdih->autojns($conditions);
        
        // Generate array
        if(!empty($skillData)){
            foreach ($skillData as $row){
                $data['id'] = $row['id_jns'];
                $data['value'] = $row['nm_jdih_jns'];
                array_push($returnData, $data);
            }
        }
        
        // Return results as json encoded array
        echo json_encode($returnData);die;
	}
	
	function autostrk() {
        $returnData = array();
        
        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        // $conditions['conditions']['bt_aktif'] = '1';
        $skillData = $this->M_jdih->autostrk($conditions);
        
        // Generate array
        if(!empty($skillData)){
            foreach ($skillData as $row){
                $data['id'] = $row['vc_k_gugus'];
                $data['value'] = $row['vc_n_gugus'];
                array_push($returnData, $data);
            }
        }
        
        // Return results as json encoded array
        echo json_encode($returnData);die;
    }
}
?>
