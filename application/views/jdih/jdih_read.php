<?php
	$this->load->view('pks/pks');
?>
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Data Projek PKS</h3>
	</div>
		
	<div class="box-body"> 
    <a href="<?php echo base_url('Jdih/list_jdih') ?>" class="btn btn-danger">Kembali</a>
    <table>
    <tr><td>Ruang Lingkup</td><td>:</td><td><?php echo $r_lingkup; ?></td></tr>
    <tr><td>Jenis Peraturan</td><td>:</td><td><?php echo $jns_prtn; ?></td></tr>
    <tr><td>Tahun Terbit</td><td>:</td><td><?php echo $th_prtn; ?></td></tr>
    <tr><td>Nomor Peraturan</td><td>:</td><td><?php echo $nmr_prtn; ?></td></tr>
    <tr><td>Nama Peraturan</td><td>:</td><td><?php echo $nm_prtn; ?></td></tr>
    <tr><td>Status Peraturan</td><td>:</td><td><?php echo $sts_prtn; ?></td></tr>
    <tr><td>Struktural</td><td>:</td><td><?php echo $stru_prtn; ?></td></tr>
    </table>
</div>
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