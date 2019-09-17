<?php
	$this->load->view('jdih/jdih');
?>

    <div class="container">
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Data Peraturan</h3>
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
    <tr><td>Unduh Dokumen</td><td>:&nbsp;&nbsp;</td><td><a href="<?php echo base_url('Jdih/download/'.$kd_jdih)?>" target="_blank">
    <i class="fa fa-file-pdf-o"></i>
    <?php echo $nm_prtn.'.pdf'?>
		</a></td></tr>
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
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
    </div>
     <!-- /.container -->
   </footer> 
</div>
</body>
</html>