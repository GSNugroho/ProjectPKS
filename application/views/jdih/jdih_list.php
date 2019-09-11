<?php
	$this->load->view('jdih/jdih');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Data PKS</h3>
    </div>
<div class="box-body">
	<?php $error;?>
	<table id="dataJDIH" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>Ruang Lingkup</th>
		<th>Jenis Peraturan</th>
		<th>Tahun Terbit</th>
		<th>Nomor Peraturan</th>
		<th>Nama Peraturan</th>
		<th>Status Peraturan</th>
		<th>Struktural</th>
		<th>Pdf</th>
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
   $('#dataJDIH').DataTable({
	//   'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'Jdih/tbl_list'?>'
      },
      'columns': [
		 { data: 'r_lingkup' },
		 { data: 'jns_prtn' },
		 { data: 'th_prtn' },
		 { data: 'nmr_prtn' },
		 { data: 'nm_prtn' },
		 { data: 'sts_prtn' },
		 { data: 'stru_prtn' },
		 { data: 'nm_doc_prtn' },
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