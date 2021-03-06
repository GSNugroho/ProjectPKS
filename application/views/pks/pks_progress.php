<?php
	$this->load->view('pks/pks');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Status Proyek PKS</h3>
	</div>
<table style="margin-left: 10px">
	 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	 <tr>
		 <td>
			  <div class="form-group">
				  <select id="prsn" class="form-control">
					  <option value="">&nbsp;Status&nbsp;</option>
					  <option value="0">0%</option>
					  <option value="25">25%</option>
					  <option value="50">50%</option>
					  <option value="75">75%</option>
					  <option value="100">100%</option>
				  </select>
			  </div>
		 </td>
	 </tr>
</table>
<div class="box-body">
	<table id="dataPKS" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th>Nama PKS</th>
			<th>Nama Instansi</th>
			<th>Pencermatan</th>
			<th>Koreksi</th>
			<th>TTD</th>
			<th>Selesai</th>
			<th>Progres</th>
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
	//    'order': [[ 6, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'Pks/progres_list'?>',
		  'data': function(data){
			  var status = $('#prsn').val();

			  data.searchByPrsn = status;
		  }
      },
      'columns': [
		  { data: 'nm_pks' },
		  { data: 'nm_instansi' },
		  { data: 'rev_pks' },
		  { data: 'cor_pks' },
		  { data: 'ttd_pks' },
		  { data: 'sls_pks' },
      	  { data: 'progres' }
      ]
	});

	$('#prsn').on('change', function(){
		table.draw(true);
	})

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