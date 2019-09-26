<?php
	$this->load->view('pks/pks');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<style>
	.link
{
   color:#333;
   text-decoration: none; 
   background-color: none;
}
</style>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Data PKS</h3>
	</div>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('Pks/export') ?>">Export ke Excel</a></p>
<div class="box-body">
	<table id="dataPKS" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>Nama PKS</th>
		<th>Nama Instansi</th>
		<th>Jenis</th>
		<th>Asal</th>
		<th>Tanggal Mulai</th>
		<th>Tanggal Akhir</th>
		<th>Status Pengerjaan</th>
		<th>PIC</th>
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
   var table = $('#dataPKS').DataTable({
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
          'url':'<?php echo base_url().'Pks/tbl_list'?>'
      },
      'columns': [
		 { data: 'nm_pks' },
		 { data: 'nm_instansi' },
		 { data: 'jns_pks' },
		 { data: 'asal_pks' },
		 { data: 'tgl_mulai' },
		 { data: 'tgl_akhir' },
		 { data: 'prsn_pks'},
		 { data: 'pic_pks' },
         { data: 'action' }
      ]
	});
	$('#dataPKS').on('dblclick', 'tr', function () {
        var data = table.row( this ).data();
        // alert( 'Untuk mengedit status '+data['nm_instansi']+' tolong pilih tombol warna hijau ' );
		window.location = $(this).closest('tr').find('td:eq(0) a').attr('href');
    } );

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