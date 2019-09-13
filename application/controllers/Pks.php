<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
		$param = 0;
		$dl_sts = 1;
		$data = array(
			'nm_instansi' => $this->input->post('nm_instansi', TRUE),
			'kd_pks' => $this->kode(),
			'jns_pks' => $this->input->post('jns_pks', TRUE),
			'des_pks' => $this->input->post('des_pks', TRUE),
			'asal_pks' => $this->input->post('asal_pks', TRUE),
			// 'r_waktu' => $this->input->post('r_waktu', TRUE),
			'tgl_mulai' => $this->input->post('rtm_waktu', TRUE),
			'tgl_akhir' => $this->input->post('rta_waktu', TRUE),
			'pic_pks' => $this->input->post('pic', TRUE),
			'dl_sts' => $dl_sts,
			'rev_pks' => $param,
			'cor_pks' => $param,
			'ttd_pks' => $param,
			'sls_pks' => $param,
			'dt_cr' => date('Y-m-d')
		);
		$this->M_pks->insert($data);
		redirect(site_url('Pks/list_pks'));
	}

	public function update($id){
		$row = $this->M_pks->get_by_id($id);

		if($row){
			$data = array(
				'kd_pks' => set_value('kd_pks', $row->kd_pks),
				'nm_instansi' => set_value('nm_instansi', $row->nm_instansi),
				'jns_pks' => set_value('jns_pks', $row->jns_pks),
				'des_pks' => set_value('des_pks', $row->des_pks),
				'asal_pks' => set_value('asal_pks', $row->asal_pks),
				'tgl_mulai' => set_value('tgl_mulai', date('Y-m-d', strtotime($row->tgl_mulai))),
				'tgl_akhir' => set_value('tgl_akhir', date('Y-m-d', strtotime($row->tgl_akhir))),
				'pic_pks' => set_value('pic_pks', $row->pic_pks)
			);
			$this->load->view('pks/pks_edit_form', $data);
		}
	}

	public function update_action(){
		$data = array(
			'nm_instansi' => $this->input->post('nm_instansi', TRUE),
			'jns_pks' => $this->input->post('jns_pks', TRUE),
			'des_pks' => $this->input->post('des_pks', TRUE),
			'asal_pks' => $this->input->post('asal_pks', TRUE),
			'tgl_mulai' => $this->input->post('rtm_waktu', TRUE),
			'tgl_akhir' => $this->input->post('rta_waktu', TRUE),
			'pic_pks' => $this->input->post('pic', TRUE)
		);
		$this->M_pks->update($this->input->post('kd_pks'), $data);
		redirect(base_url('pks/list_pks'));
	}

	public function delete($id){
		$row = $this->M_pks->get_by_id($id);
		$dl_sts = 0;

		if($row){
			$data = array(
				'dl_sts' => $dl_sts
			);
			$this->M_pks->update($id, $data);
			redirect(base_url('Pks/list_pks'));
		}
	}

	public function proses($id){
		$row = $this->M_pks->get_by_id($id);
		
		if($row){
			if(($row->rev_pks == 0)&&($row->cor_pks == 0)&&($row->ttd_pks == 0)&&($row->sls_pks == 0)){
				$rev_pks = 0;
				$cor_pks = 2;
				$ttd_pks = 2;
				$sls_pks = 2;
			}else if(($row->rev_pks == 1)&&($row->cor_pks == 0)&&($row->ttd_pks == 0)&&($row->sls_pks == 0)){
				$rev_pks = 1;
				$cor_pks = 0;
				$ttd_pks = 2;
				$sls_pks = 2;
			}else if(($row->rev_pks == 1)&&($row->cor_pks == 1)&&($row->ttd_pks == 0)&&($row->sls_pks == 0)){
				$rev_pks = 1;
				$cor_pks = 1;
				$ttd_pks = 0;
				$sls_pks = 2;
			}else if(($row->rev_pks == 1)&&($row->cor_pks == 1)&&($row->ttd_pks == 1)&&($row->sls_pks == 0)){
				$rev_pks = 1;
				$cor_pks = 1;
				$ttd_pks = 1;
				$sls_pks = 0;
			}else{
				$rev_pks = 1;
				$cor_pks = 1;
				$ttd_pks = 1;
				$sls_pks = 1;
			}
			$data = array(
				'rev_pks' => $rev_pks,
				'cor_pks' => $cor_pks,
				'ttd_pks' => $ttd_pks,
				'sls_pks' => $sls_pks,
				'kd_pks' => set_value('kd_pks', $row->kd_pks)
			);
		}

		$this->load->view('pks/pks_proses', $data);
	}

	public function proses_action(){
		
		$rev_pks = $this->input->post('rev_pks');
		$cor_pks = $this->input->post('cor_pks');
		$ttd_pks = $this->input->post('ttd_pks');
		$sls_pks = $this->input->post('sls_pks');

		if(($rev_pks == 1)&&($cor_pks == 0)&&($ttd_pks == 0)&&($sls_pks == 0)){
			$data = array(
				'rev_pks' => $rev_pks,
				'date_rev' => date('Y-m-d')
			);
		}else if(($rev_pks == 1)&&($cor_pks == 1)&&($ttd_pks == 0)&&($sls_pks == 0)){
			$data = array(
				'cor_pks' => $cor_pks,
				'date_cor' => date('Y-m-d')
			);
		}else if(($rev_pks == 1)&&($cor_pks == 1)&&($ttd_pks == 1)&&($sls_pks == 0)){
			$data = array(
				'ttd_pks' => $ttd_pks,
				'date_ttd' => date('Y-m-d')
			);
		}else if(($rev_pks == 1)&&($cor_pks == 1)&&($ttd_pks == 1)&&($sls_pks == 1)){
			$data = array(
				'sls_pks' => $sls_pks,
				'date_sls' => date('Y-m-d')
			);
		}

		$this->M_pks->update($this->input->post('kd_pks'), $data);
		redirect(base_url('PKS/list_pks'));
		
	}

	public function list_pks()
	{
		$data = array(
			
		);
		$this->load->view('pks/pks_list');
	}
	
	public function read($id){
		$row = $this->M_pks->get_by_id($id);

		if($row){
			$jp = $row->jns_pks;
			if($jp == 1){
			$jns_pks = 'Manajerial';
			}else if($jp == 2){
			$jns_pks = 'Medis';
			}else{
			$jns_pks = '';
			}

			if(!empty($row->date_rev)){$date_rev = date('d-m-Y', strtotime($row->date_rev));}
			else{$date_rev = '';}
			if(!empty($row->date_cor)){$date_cor = date('d-m-Y', strtotime($row->date_cor));}
			else{$date_cor = '';}
			if(!empty($row->date_ttd)){$date_ttd = date('d-m-Y', strtotime($row->date_ttd));}
			else{$date_ttd = '';}
			if(!empty($row->date_sls)){$date_sls = date('d-m-Y', strtotime($row->date_rev));}
			else{$date_sls = '';}
			$data = array(
				'kd_pks' => set_value('kd_pks', $row->kd_pks),
				'nm_instansi' => set_value('nm_instansi', $row->nm_instansi),
				'jns_pks' => $jns_pks,
				'des_pks' => set_value('des_pks', $row->des_pks),
				'asal_pks' => set_value('asal_pks', $row->asal_pks),
				'tgl_mulai' => set_value('tgl_mulai', date('d-m-Y', strtotime($row->tgl_mulai))),
				'tgl_akhir' => set_value('tgl_akhir', date('d-m-Y', strtotime($row->tgl_akhir))),
				'pic_pks' => set_value('pic_pks', $row->pic_pks),
				'date_rev' => $date_rev,
				'date_cor' => $date_cor,
				'date_ttd' => $date_ttd,
				'date_sls' => $date_sls
			);
			$this->load->view('pks/pks_read', $data);
		}
	}

	public function progress()
	{
		$this->load->view('pks/pks_progress');
	}

	public function export_excel(){
		$data = array( 
			'title' => 'Laporan Excel | Projek PKS',
			'isi' => $this->M_pks->getAll());

   		$this->load->view('pks/pks_export',$data);
	}

	public function export(){
		$data = $this->M_pks->getAll();

          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Nama Instansi')
                      ->setCellValue('C1', 'Jenis')
                      ->setCellValue('D1', 'Asal')
                      ->setCellValue('E1', 'Tanggal Mulai')
                      ->setCellValue('F1', 'Tanggal Akhir')
                      ->setCellValue('G1', 'PIC');

          $kolom = 2;
          $nomor = 1;
          foreach($data as $row) {
			if($row->jns_pks == 1){$jns_pks = 'Menejerial';}else{$jns_pks = 'Medis';}

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $row->nm_instansi)
                           ->setCellValue('C' . $kolom, $jns_pks)
                           ->setCellValue('D' . $kolom, $row->asal_pks)
                           ->setCellValue('E' . $kolom, date('j F Y', strtotime($row->tgl_mulai)))
                           ->setCellValue('F' . $kolom, date('j F Y', strtotime($row->tgl_akhir)))
                           ->setCellValue('G' . $kolom, $row->pic_pks);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
	 	header('Content-Disposition: attachment;filename="Latihan.xlsx"');
	  	header('Cache-Control: max-age=0');

	  $writer->save('php://output');
	}

	function kode(){
		$kode = $this->M_pks->get_kode();
		foreach($kode as $row){
			$data = $row->maxkode;
		}

		$kd_pks = $data;
		$noUrut = (int) substr($kd_pks, 3, 6);
		$noUrut++;
		$char = "PKS";
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
		<a href="proses/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		<i class="fa fa-refresh"></i>
		</a>
		<a href="read/'.$row->kd_pks.'" class="btn btn-info btn-circle ">
		<i class="fa fa-info"></i>
		</a>
		<a href="update/'.$row->kd_pks.'" class="btn btn-warning btn-circle">
        <i class="fa fa-edit"></i>
        </a>
		<a href="delete/'.$row->kd_pks.'" class="btn btn-danger btn-circle">
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

	function progres_list(){
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
		$sel = $this->M_pks->get_total_dt_p();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_pks->get_total_fl_p($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_pks->get_total_ft_p($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
		$data = array();

		foreach($empRecords as $row){
		if(($row->rev_pks == 1)&&($row->cor_pks == 0)&&($row->ttd_pks == 0)&&($row->sls_pks == 0)){
			$persen = 25;
		}else if(($row->rev_pks == 1)&&($row->cor_pks == 1)&&($row->ttd_pks == 0)&&($row->sls_pks == 0)){
			$persen = 50;
		}else if(($row->rev_pks == 1)&&($row->cor_pks == 1)&&($row->ttd_pks == 1)&&($row->sls_pks == 0)){
			$persen = 75;
		}else if(($row->rev_pks == 1)&&($row->cor_pks == 1)&&($row->ttd_pks == 1)&&($row->sls_pks == 1)){
			$persen = 100;
		}else{$persen = 0;}

		if($row->rev_pks == 1){
		$b_rev = '<a class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_rev)).'
		</a>';}else{
		$b_rev = '<a class="btn btn-danger btn-circle">
		
		</a>';
		}

		if($row->cor_pks == 1){
		$b_cor = '<a class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_cor)).'
		</a>';}else{
		$b_cor = '<a class="btn btn-danger btn-circle">
		
		</a>';}

		if($row->ttd_pks == 1){
		$b_ttd = '<a class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_ttd)).'
		</a>';}else{
		$b_ttd = '<a class="btn btn-danger btn-circle">
			
		</a>';}

		if($row->sls_pks == 1){
		$b_sls = '<a class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_sls)).'
		</a>';}else{
		$b_sls = '<a class="btn btn-danger btn-circle">
				
		</a>';}


		$button = '
		<div class="progress progress-sm active">
		<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%">
		  </div>
		</div>
		'.$persen.'% Selesai
		';
	
		$data[] = array( 
			"nm_instansi" => $row->nm_instansi,
			"des_pks" => $row->des_pks,
			"rev_pks" => $b_rev,
			"cor_pks" => $b_cor,
			"ttd_pks" => $b_ttd,
			"sls_pks" => $b_sls,
			"progres" => $button
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
