<?php
	$this->load->view('pks/pks');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Data PKS</h3>
	</div>
<p><a href="<?php echo base_url('Pks/export_excel') ?>">Export ke Excel</a></p>
<div class="box-body">
	<table id="dataPKS" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>Nama Instansi</th>
		<th>Jenis</th>
		<th>Asal</th>
		<th>Tanggal Mulai</th>
		<th>Tanggal Akhir</th>
		<th>PIC</th>
		<th>Action</th>
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
   $('#dataPKS').DataTable({
	//   'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'Pks/tbl_list'?>'
      },
      'columns': [
		 { data: 'nm_instansi' },
		 { data: 'jns_pks' },
		 { data: 'asal_pks' },
		 { data: 'tgl_mulai' },
		 { data: 'tgl_akhir' },
		 { data: 'pic_pks' },
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
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </div>
     <!-- /.container -->
   </footer> 
</div>
</body>
</html>