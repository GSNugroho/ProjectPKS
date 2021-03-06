<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pks extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		// if ((!empty($_SESSION['nmUser'])) && (!empty($_SESSION['unameApp'])) && (!empty($_SESSION['passwrdApp'])) && (!empty($_SESSION['nik'])) && (!empty($_SESSION['gugus']))) {
			$this->load->library('session');
			$this->load->model('M_pks');
			$this->load->library('form_validation');
		// } else {
		// 	echo "Silahkan Login Terlebih Dahulu";
		// 	echo redirect(base_url('../'));
		// }
    }

	public function index()
	{
		$data = array(
			'g_t_pks' => $this->M_pks->get_g_pks(),
			'g_t_pks_bsls' => $this->M_pks->get_g_pks_bsls(),
			'g_t_pks_sls' => $this->M_pks->get_g_pks_sls(),
			'tot_respon' => $this->M_pks->get_respon(),
			'grafik_persen' => $this->M_pks->get_total_persen(),
			'tot_info' => $this->M_pks->get_total_info()
		);
		$this->load->view('pks/pks_db', $data);
	}
	
	public function create()
	{
		$data = array(
			'nm_instansi' => set_value('nm_instansi'),
			'nm_pks' => set_value('nm_pks'),
			'jns_pks' => set_value('jns_pks'),
			'des_pks' => set_value('des_pks'),
			'asal_pks' => set_value('asal_pks'),
			'tgl_mulai' => set_value('rtm_waktu'),
			'tgl_akhir' => set_value('rta_waktu'),
			'pic_pks' => set_value('pic_pks'),
			'tot_info' => $this->M_pks->get_total_info()
		);
		$this->load->view('pks/pks_input_form', $data);
	}
	
	public function create_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
		$param = 0;
		$dl_sts = 1;
		$prsn_0 = '0';
		$sekarang = date('Y-m-d');
		if(($this->input->post('asal_pks')) == 'Internal'){
			$expired = date('Y-m-d', strtotime('+28 day', strtotime($sekarang)));
		}else if(($this->input->post('asal_pks')) == 'Eksternal'){
			$expired = date('Y-m-d', strtotime('+41 day', strtotime($sekarang)));
		}

		$data = array(
			'kd_pks' => $this->kode(),
			'nm_instansi' => $this->input->post('nm_instansi', TRUE),
			'nm_pks' => $this->input->post('nm_pks', TRUE),
			'jns_pks' => $this->input->post('jns_pks', TRUE),
			'des_pks' => $this->input->post('des_pks', TRUE),
			'asal_pks' => $this->input->post('asal_pks', TRUE),
			'tgl_mulai' => date('Y-m-d', strtotime($this->input->post('rtm_waktu'))),
			'tgl_akhir' => date('Y-m-d', strtotime($this->input->post('rta_waktu'))),
			'pic_pks' => $this->input->post('pic_pks', TRUE),
			'dl_sts' => $dl_sts,
			'dt_cr' => date('Y-m-d'),
			'dt_exp' => $expired,
			'prsn_pks' => $prsn_0
		);
		// $this->do_upload();
		$this->M_pks->insert($data);
		$this->session->set_flashdata('message', 'Tambah Data PKS Berhasil');
		redirect(site_url('Pks/list_pks'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nm_instansi', 'Nama Instansi', 'trim|required');
		$this->form_validation->set_rules('nm_pks', 'Nama PKS', 'trim|required');
		$this->form_validation->set_rules('jns_pks', 'Jenis PKS', 'trim|required');
		$this->form_validation->set_rules('des_pks', 'Deskripsi PKS', 'trim|required');
		$this->form_validation->set_rules('asal_pks', 'Asal PKS', 'trim|required');
		$this->form_validation->set_rules('rtm_waktu', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('rta_waktu', 'Tanggal Selesai', 'trim|required');
		$this->form_validation->set_rules('pic_pks', 'PIC', 'trim|required');
		// $this->form_validation->set_rules('data_pks', 'Upload', 'trim|required');

		$this->form_validation->set_error_delimiters('<i class="fa fa-fw fa-info-circle text-danger"></i><span class="text-danger">', '</span>');
	}

	public function do_upload(){
		$this->load->helper('security');
		$name = $this->kode().'.pdf';
		$en_name = do_hash($name, 'md5');

		$config = array(
			'upload_path' => "uploads/",
			// 'upload_path' => "dt.rspantiwaluyo/pks/",
			'file_name' => $en_name,
			'allowed_types' => "pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('dok_pks')){
			$upload_data = $this->upload->data();
			$fileName = $upload_data['file_name'];

			//File path at local server
        	$source = 'uploads/'.$fileName;
                
        	//Load codeigniter FTP class
        	$this->load->library('ftp');
                
			//FTP configuration
			$ciphertext = 'bqySZoc9IFNZfT+lAUW1tFIQPGyNhgtqq/Iv5U5Zdhs7BQ+SAbbmbYgwnva56gKnZN6+zEl1lPbVL+hgBZSEBQ==';
			$c = base64_decode($ciphertext);
			$ivlen = openssl_cipher_iv_length($cipher="AES-256-CBC");
			$iv = substr($c, 0, $ivlen);
			$hmac = substr($c, $ivlen, $sha2len=32);
			$ciphertext_raw = substr($c, $ivlen+$sha2len);
			$key = 'RSPW5010';
			$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);

			$ftp_config['hostname'] = 'dt.rspantiwaluyo.com'; 
        	$ftp_config['username'] = 'ftp-rspw';
			$ftp_config['password'] = $original_plaintext;
			$ftp_config['port']		= 2121;
        	$ftp_config['debug']    = TRUE;
                
        	//Connect to the remote server
        	$this->ftp->connect($ftp_config);
                
        	//File upload path of remote server
			$destination = '/Web/upload/pks/'.$fileName;
                
        	//Upload file to the remote server
        	$this->ftp->upload($source, ".".$destination);
                
        	//Close FTP connection
        	$this->ftp->close();
                
        	//Delete file from local server
        	@unlink($source);
		}else{
			
			$this->session->set_flashdata('messages', 'Upload Data Peraturan Gagal');
			redirect(base_url('Pks/list_pks'));
		}
	}

	public function read_pdf($id){
		$this->load->helper('download');
		$this->load->helper('security');

		$row = $this->M_pks->get_by_id($id);
		if($row){
			$nm_pks = $row->nm_pks;
		}

		$e_name = $id.'.pdf';
		$en_name = do_hash($e_name, 'md5');
		$data = array('en_name' => $en_name);
		$this->load->view('pks/pks_read_pdf', $data);
	}

	public function update($id){
		$row = $this->M_pks->get_by_id($id);

		if($row){
			$data = array(
				'kd_pks' => set_value('kd_pks', $row->kd_pks),
				'nm_pks' => set_value('nm_pks', $row->nm_pks),
				'nm_instansi' => set_value('nm_instansi', $row->nm_instansi),
				'jns_pks' => set_value('jns_pks', $row->jns_pks),
				'des_pks' => set_value('des_pks', $row->des_pks),
				'asal_pks' => set_value('asal_pks', $row->asal_pks),
				'tgl_mulai' => set_value('tgl_mulai', date('d/m/Y', strtotime($row->tgl_mulai))),
				'tgl_akhir' => set_value('tgl_akhir', date('d/m/Y', strtotime($row->tgl_akhir))),
				'pic_pks' => set_value('pic_pks', $row->pic_pks),
				'tot_info' => $this->M_pks->get_total_info()
			);
			$this->load->view('pks/pks_edit_form', $data);
		}
	}

	public function update_action(){
		$data = array(
			'nm_pks' => $this->input->post('nm_pks', TRUE),
			'nm_instansi' => $this->input->post('nm_instansi', TRUE),
			'jns_pks' => $this->input->post('jns_pks', TRUE),
			'des_pks' => $this->input->post('des_pks', TRUE),
			'asal_pks' => $this->input->post('asal_pks', TRUE),
			'tgl_mulai' => date('Y-m-d', strtotime($this->input->post('rtm_waktu'))),
			'tgl_akhir' => date('Y-m-d', strtotime($this->input->post('rta_waktu'))),
			'pic_pks' => $this->input->post('pic', TRUE)
		);

		// if(!empty($_FILES)){
		// $this->do_upload_update($this->input->post('kd_pks'));
		// }else{echo "Lanjut"; echo $this->input->post('dok_pks');}
		$this->M_pks->update($this->input->post('kd_pks'), $data);
		$this->session->set_flashdata('message', 'Sunting Data PKS Berhasil');
		redirect(base_url('pks/list_pks'));
	}

	public function do_upload_update($id)
	{
		$this->load->helper('security');
		$name = $id.'.pdf';
		$en_name = do_hash($name, 'md5');

		$config = array(
			'upload_path' => "uploads/",
			// 'upload_path' => "dt.rspantiwaluyo/pks",
			'file_name' => $en_name,
			'allowed_types' => "pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('dok_pks'))
		{
			$upload_data = $this->upload->data();
			$fileName = $upload_data['file_name'];
        // //File path at local server
        	$source = 'uploads/'.$fileName;
                
        // //Load codeigniter FTP class
        	$this->load->library('ftp');
                
		//FTP configuration
			
			$ciphertext = 'bqySZoc9IFNZfT+lAUW1tFIQPGyNhgtqq/Iv5U5Zdhs7BQ+SAbbmbYgwnva56gKnZN6+zEl1lPbVL+hgBZSEBQ==';
			$c = base64_decode($ciphertext);
			$ivlen = openssl_cipher_iv_length($cipher="AES-256-CBC");
			$iv = substr($c, 0, $ivlen);
			$hmac = substr($c, $ivlen, $sha2len=32);
			$ciphertext_raw = substr($c, $ivlen+$sha2len);
			$key = 'RSPW5010';
			$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);

			$ftp_config['hostname'] = 'dt.rspantiwaluyo.com'; 
        	$ftp_config['username'] = 'ftp-rspw';
			$ftp_config['password'] = $original_plaintext;
			$ftp_config['port']		= 2121;
			$ftp_config['debug']    = TRUE;
			
        // Connect to the remote server
        	$this->ftp->connect($ftp_config);
        
        //File upload path of remote server
        	$destination = '/Web/upload/pks/'.$fileName;
                
        //Upload file to the remote server
        	$this->ftp->upload($source, ".".$destination);
                
        //Close FTP connection
        	$this->ftp->close();
                
        //Delete file from local server
        	@unlink($source);
		}else{
			$this->session->set_flashdata('messages', 'Upload Data Peraturan Gagal');
			redirect(base_url('Pks/list_pks'));
		}
	}

	public function delete($id){
		$row = $this->M_pks->get_by_id($id);
		$dl_sts = 0;

		if($row){
			$data = array(
				'dl_sts' => $dl_sts
			);
			$this->M_pks->update($id, $data);
			$this->session->set_flashdata('messages', 'Hapus Data PKS Berhasil');
			redirect(base_url('Pks/list_pks'));
		}
	}

	public function delete_file($id){
		$this->load->helper('security');

		$e_name = $id.'.pdf';
		$en_name = do_hash($e_name, 'md5');
		unlink(FCPATH.'https://dt.rspantiwaluyo.com/pks/'.$en_name.'.pdf');
	}

	public function proses($id){
		// $row = $this->M_pks->get_proses_info($id);
		$row = $this->M_pks->get_by_id($id);

		if($row){
			$data = array(
				'kd_pks' => set_value('kd_pks', $row->kd_pks),
				'nm_instansi' => set_value('nm_instansi', $row->nm_instansi),
				'nm_pks' => set_value('nm_pks', $row->nm_pks),
				'detail_proses' => $this->M_pks->get_proses_info($id),
				'tot_info' => $this->M_pks->get_total_info()
			);
		}

		$this->load->view('pks/pks_proses', $data);
	}

	public function proses_action(){
		
		$dt_sts = $this->input->post('sts_pr');
		$dt_ct = $this->input->post('ct_sts');
		$dt_ur = $this->input->post('user');
		// $dt_ur = $this->session->userdata('nmUser');
		if(!empty($dt_sts)){$sts_pks = '1';}
		$prsn_1 = '25';
		$prsn_2 = '50';
		$prsn_3 = '75';
		$prsn_4 = '100';

		if($dt_sts == 1){
			$data = array(
				'kd_pks' => $this->input->post('kd_pks'),
				'd_tind' => $dt_sts,
				'tgl_tind' => date('Y-m-d'),
				'ket_tind' => $dt_ct,
				'pic_tind' => $dt_ur,
			);
			$data_p = array(
				'prsn_pks' => $prsn_1,
				'date_rev' => date('Y-m-d')
			);
		}elseif($dt_sts == 2){
			$data = array(
				'kd_pks' => $this->input->post('kd_pks'),
				'd_tind' => $dt_sts,
				'tgl_tind' => date('Y-m-d'),
				'ket_tind' => $dt_ct,
				'pic_tind' => $dt_ur,
			);
			$data_p = array(
				'prsn_pks' => $prsn_2,
				'date_cor' => date('Y-m-d')
			);
		}elseif($dt_sts == 3){
			$data = array(
				'kd_pks' => $this->input->post('kd_pks'),
				'd_tind' => $dt_sts,
				'tgl_tind' => date('Y-m-d'),
				'ket_tind' => $dt_ct,
				'pic_tind' => $dt_ur,
			);
			$data_p = array(
				'prsn_pks' => $prsn_3,
				'date_ttd' => date('Y-m-d')
			);
		}elseif($dt_sts == 4){
			$data = array(
				'kd_pks' => $this->input->post('kd_pks'),
				'd_tind' => $dt_sts,
				'tgl_tind' => date('Y-m-d'),
				'ket_tind' => $dt_ct,
				'pic_tind' => $dt_ur,
			);
			$data_p = array(
				'prsn_pks' => $prsn_4,
				'date_sls' => date('Y-m-d')
			);
		}

		$this->M_pks->insert_detail($data);
		$this->M_pks->update($this->input->post('kd_pks'), $data_p);
		$this->session->set_flashdata('message', 'Ubah Status Data PKS Berhasil');
		redirect(base_url('Pks/list_pks'));
		
	}

	public function list_pks()
	{
		$data = array(
			'tot_info' => $this->M_pks->get_total_info()
		);
		
		$this->load->view('pks/pks_list', $data);
	}
	
	public function read($id){
		$row = $this->M_pks->get_by_id($id);

		if($row){
			$data = array(
				'kd_pks' => set_value('kd_pks', $row->kd_pks),
				'nm_instansi' => set_value('nm_instansi', $row->nm_instansi),
				'jns_pks' => set_value('jns_pks', $row->nm_jns_pks),
				'des_pks' => set_value('des_pks', $row->des_pks),
				'asal_pks' => set_value('asal_pks', $row->asal_pks),
				'tgl_mulai' => set_value('tgl_mulai', date('d-m-Y', strtotime($row->tgl_mulai))),
				'tgl_akhir' => set_value('tgl_akhir', date('d-m-Y', strtotime($row->tgl_akhir))),
				'pic_pks' => set_value('pic_pks', $row->pic_pks),
				'detail_proses' => $this->M_pks->get_proses_info($id),
				'tot_info' => $this->M_pks->get_total_info()
			);
			$this->load->view('pks/pks_read', $data);
		}
	}

	public function read_progress1($id){
		$row = $this->M_pks->get_by_id($id);
		$param = 1;
		if($row){
			$data = array(
				'detail_proses' => $this->M_pks->get_proses_info_detail($id, $param),
				'param' => $param,
				'tot_info' => $this->M_pks->get_total_info()
			);
			$this->load->view('pks/pks_info_progress', $data);
		}
	}
	public function read_progress2($id){
		$row = $this->M_pks->get_by_id($id);
		$param = 2;
		if($row){
			$data = array(
				'detail_proses' => $this->M_pks->get_proses_info_detail($id, $param),
				'param' => $param,
				'tot_info' => $this->M_pks->get_total_info()
			);
			$this->load->view('pks/pks_info_progress', $data);
		}
	}
	public function read_progress3($id){
		$row = $this->M_pks->get_by_id($id);
		$param = 3;
		if($row){
			$data = array(
				'detail_proses' => $this->M_pks->get_proses_info_detail($id, $param),
				'param' => $param,
				'tot_info' => $this->M_pks->get_total_info()
			);
			$this->load->view('pks/pks_info_progress', $data);
		}
	}
	public function read_progress4($id){
		$row = $this->M_pks->get_by_id($id);
		$param = 4;
		if($row){
			$data = array(
				'detail_proses' => $this->M_pks->get_proses_info_detail($id, $param),
				'param' => $param,
				'tot_info' => $this->M_pks->get_total_info()
			);
			$this->load->view('pks/pks_info_progress', $data);
		}
	}

	public function progress()
	{
		$data = array(
			'tot_info' => $this->M_pks->get_total_info()
		);
		$this->load->view('pks/pks_progress', $data);
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
                      ->setCellValue('B1', 'Nama PKS')
					  ->setCellValue('C1', 'Nama Instansi')
					  ->setCellValue('D1', 'Tanggal Masuk PKS')
                      ->setCellValue('E1', 'Jenis')
                      ->setCellValue('F1', 'Asal')
                      ->setCellValue('G1', 'Tanggal Mulai')
                      ->setCellValue('H1', 'Tanggal Akhir')
                      ->setCellValue('I1', 'Persentase Pengerjaan PKS')
                      ->setCellValue('J1', 'PIC');

          $kolom = 2;
          $nomor = 1;
          foreach($data as $row) {
			if($row->jns_pks == 1){$jns_pks = 'Menejerial';}else{$jns_pks = 'Klinis';}

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $row->nm_pks)
						   ->setCellValue('C' . $kolom, $row->nm_instansi)
						   ->setCellValue('D' . $kolom, date('d-m-Y', strtotime($row->dt_cr)))
                           ->setCellValue('E' . $kolom, $jns_pks)
                           ->setCellValue('F' . $kolom, $row->asal_pks)
                           ->setCellValue('G' . $kolom, date('d-m-Y', strtotime($row->tgl_mulai)))
                           ->setCellValue('H' . $kolom, date('d-m-Y', strtotime($row->tgl_akhir)))
                           ->setCellValue('I' . $kolom, $row->prsn_pks)
                           ->setCellValue('J' . $kolom, $row->pic_pks);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data_PKS.xlsx"');
		// header('Content-Disposition: attachment;filename="Data_PKS.xls"');
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

		##Custom Search
		## Search 
		$searchQuery = "";
		if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
			$searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
            $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
			$searchQuery .= " and (tgl_mulai BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
		 }
		 
		$jenis = $this->input->post('searchByJenis');
		if($jenis != ''){
			$searchQuery .= "and jns_pks = '".$jenis."'";
		}

		$prsn = $this->input->post('searchByPrsn');
		if($prsn != ''){
			$searchQuery .= "and prsn_pks = '".$prsn."'";
		}

		if($searchValue != ''){
		$searchQuery .= " and (
		kd_pks like '%".$searchValue."%' or 
		nm_instansi like '%".$searchValue."%' or 
		des_pks like '%".$searchValue."%' or 
		asal_pks like'%".$searchValue."%' or
		tgl_mulai like'%".$searchValue."%' or
		pic_pks like'%".$searchValue."%' or
		prsn_pks like'%".$searchValue."%' or
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
		</a>
		<a href="proses/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		<i class="fa fa-exchange"></i>
		</a>';
		
		$button = '
		
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
		$dbl_clk = '<a href="proses/'.$row->kd_pks.'"><div class="link">'.$row->nm_pks.'</div></a>';
		
		$j_p = $row->jns_pks;
		if($j_p == 1){
			$jns_pks = 'Manajerial';
		}else if($j_p == 2){
			$jns_pks = 'Klinis';
		}else{
			$jns_pks = '';
		}

		$data[] = array( 
			// "nm_pks" => $row->nm_pks,
			"nm_pks" => $dbl_clk,
			"nm_instansi" => $row->nm_instansi,
			"jns_pks" => $jns_pks,
			"des_pks" => $row->des_pks,
			"asal_pks" => $row->asal_pks,
			"tgl_mulai" => date('d/m/Y', strtotime($row->tgl_mulai)),
			"tgl_akhir" => date('d/m/Y', strtotime($row->tgl_akhir)),
			"prsn_pks" => $row->prsn_pks.'%',
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

		$searchByPrsn = $this->input->post('searchByPrsn');
		if($searchByPrsn != ''){
			$searchQuery .= "and prsn_pks = '".$searchByPrsn."'";
		}

		if($searchValue != ''){
		$searchQuery .= " and (
		kd_pks like '%".$searchValue."%' or 
		nm_instansi like '%".$searchValue."%' or 
		jns_pks like '%".$searchValue."%' or 
		des_pks like '%".$searchValue."%' or 
		asal_pks like'%".$searchValue."%' or
		tgl_mulai like'%".$searchValue."%' or
		pic_pks like'%".$searchValue."%' or
		prsn_pks like'%".$searchValue."%' or
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
		if(($row->date_rev != NULL)&&($row->date_cor == NULL)&&($row->date_ttd == NULL)&&($row->date_sls == NULL)){
			$persen = 25;
		}else if(($row->date_rev != NULL)&&($row->date_cor != NULL)&&($row->date_ttd == NULL)&&($row->date_sls == NULL)){
			$persen = 50;
		}else if(($row->date_rev != NULL)&&($row->date_cor != NULL)&&($row->date_ttd != NULL)&&($row->date_sls == NULL)){
			$persen = 75;
		}else if(($row->date_rev != NULL)&&($row->date_cor != NULL)&&($row->date_ttd != NULL)&&($row->date_sls != NULL)){
			$persen = 100;
		}else{$persen = 0;}

		if(($row->date_rev != NULL) && ($row->date_rev < $row->dt_exp)){
		$b_rev = '<a href="read_progress1/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_rev)).'
		</a>';}else if(($row->date_rev != NULL) && ($row->date_rev > $row->dt_exp)){
		$b_rev = '<a href="read_progress1/'.$row->kd_pks.'" class="btn btn-danger btn-circle">
		'.date('d-m-Y', strtotime($row->date_rev)).'
		</a>';}
		else{
		$b_rev = '<a class="btn btn-danger btn-circle">
		
		</a>';
		}

		if(($row->date_cor != NULL) && ($row->date_cor < $row->dt_exp)){
		$b_cor = '<a href="read_progress2/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_cor)).'
		</a>';}else if(($row->date_cor != NULL) && ($row->date_cor > $row->dt_exp)){
		$b_cor = '<a href="read_progress2/'.$row->kd_pks.'" class="btn btn-danger btn-circle">
		'.date('d-m-Y', strtotime($row->date_cor)).'
		</a>';}
		else{
		$b_cor = '<a class="btn btn-danger btn-circle">
		
		</a>';}

		if(($row->date_ttd != NULL) && ($row->date_ttd < $row->dt_exp)){
		$b_ttd = '<a href="read_progress3/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_ttd)).'
		</a>';}else if(($row->date_ttd != NULL) && ($row->date_ttd > $row->dt_exp)){
		$b_ttd = '<a href="read_progress3/'.$row->kd_pks.'" class="btn btn-danger btn-circle">
		'.date('d-m-Y', strtotime($row->date_ttd)).'
		</a>';}
		else{
		$b_ttd = '<a class="btn btn-danger btn-circle">
			
		</a>';}

		if(($row->date_sls != NULL) && ($row->date_sls < $row->dt_exp)){
		$b_sls = '<a href="read_progress4/'.$row->kd_pks.'" class="btn btn-success btn-circle">
		'.date('d-m-Y', strtotime($row->date_sls)).'
		</a>';}else if(($row->date_sls != NULL) && ($row->date_sls > $row->dt_exp)){
		$b_sls = '<a href="read_progress4/'.$row->kd_pks.'" class="btn btn-danger btn-circle">
		'.date('d-m-Y', strtotime($row->date_sls)).'
		</a>';}
		else{
		$b_sls = '<a class="btn btn-danger btn-circle">
				
		</a>';}


		if($persen != 100)
		{
		$button = '
		<div class="progress progress-sm active">
		<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$persen.'%">
		  </div>
		</div>
		'.$persen.'% Selesai
		';
		}else if($persen == 100)
		{
		$button = '
		'.$persen.'% Selesai
		';
		}
	
		$data[] = array( 
			"nm_instansi" => $row->nm_instansi,
			"nm_pks" => $row->nm_pks,
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

	function autoins() {
        $returnData = array();
        
        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        // $conditions['conditions']['bt_aktif'] = '1';
        $skillData = $this->M_pks->autoins($conditions);
        
        // Generate array
        if(!empty($skillData)){
            foreach ($skillData as $row){
                $data['id'] = $row['vc_k_png'];
                $data['value'] = $row['vc_n_png'];
                array_push($returnData, $data);
            }
        }
        
        // Return results as json encoded array
        echo json_encode($returnData);die;
    }
		
	function edit_tindakan()
	{
		if(isset($_POST['edit_row']))
		{
			$id = $this->input->post('row_id');
			$ket = $this->input->post('ket_val');
			$pic = $this->input->post('pic_val');

			$data = array(
				'ket_tind' => $ket,
				'pic_tind' => $pic
			);

			$this->M_pks->update_tindakan($id, $data);
			echo "success";
			// redirect(base_url('Pks/list_pks'));
			exit();
		}
	}
}
?>