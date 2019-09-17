<?php
	$this->load->view('jdih/jdih');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">

    <div class="container">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Data Peraturan</h3>
    </div>
<div class="box-body">
	<?php $error;?>
	<table id="dataJDIH" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>Nama Peraturan</th>
		<th>Jenis Peraturan</th>
		<th>Ruang Lingkup</th>
		<th>Tahun Terbit</th>
		<!-- <th>Nomor Peraturan</th> -->
		<!-- <th>Status Peraturan</th> -->
		<th>Bagian Terkait</th>
		<!-- <th>Pdf</th> -->
		<th>Tindakan</th>
		</tr>
		</thead>
	</table>
	</div>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script>
	
	$(document).ready(function(){
   $('#dataJDIH').DataTable({
	language: {
	"sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
	"sProcessing":   "Sedang memproses...",
	"sLengthMenu":   "Tampilkan _MENU_ entri",
	"sZeroRecords":  "Tidak ditemukan data yang sesuai",
	"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
	"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
	"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
	"sInfoPostFix":  "",
	"sSearch":       "Cari:",
	"sUrl":          "",
	"oPaginate": {
		"sFirst":    "Pertama",
		"sPrevious": "Sebelumnya",
		"sNext":     "Selanjutnya",
		"sLast":     "Terakhir"
	}
	},
	   
	//   'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'Jdih/tbl_list'?>'
      },
      'columns': [
		 { data: 'nm_prtn' },
		 { data: 'jns_prtn' },
		 { data: 'r_lingkup' },
		 { data: 'th_prtn' },
		//  { data: 'nmr_prtn' },
		//  { data: 'sts_prtn' },
		 { data: 'stru_prtn' },
		//  { data: 'nm_doc_prtn' },
         { data: 'action' }
      ]
	});
	});
	
</script>
</div>
</div>
</div>
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.4.18 -->
      </div>
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
    </div>
     <!-- /.container -->
   </footer> 
</div>
</body>
</html>