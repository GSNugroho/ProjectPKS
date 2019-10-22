<?php
	$this->load->view('pks/pks');
?>
<div class="box box-info">
	<div class="box-header with-border">
    	<h3 class="box-title">Data Proyek PKS</h3>
	</div>
		
	<div class="box-body">
    <a href="<?php echo base_url('Pks/list_pks') ?>" class="btn btn-danger">Kembali</a>   
    <table>
    <tr><td>Nama Instansi</td><td>:</td><td><?php echo $nm_instansi; ?></td></tr>
    <tr><td>Jenis PKS</td><td>:</td><td><?php echo $jns_pks; ?></td></tr>
    <tr><td>Deskripsi PKS</td><td>:</td><td><?php echo $des_pks; ?></td></tr>
    <tr><td>Asal Permohonan PKS</td><td>:</td><td><?php echo $asal_pks; ?></td></tr>
    <tr><td>Tanggal Mulai PKS</td><td>:</td><td><?php echo $tgl_mulai; ?></td></tr>
    <tr><td>Tanggal Selesai PKS</td><td>:</td><td><?php echo $tgl_akhir; ?></td></tr>
    <tr><td>PIC</td><td>:</td><td><?php echo $pic_pks; ?></td></tr>
    <tr><td>Tanggal Revisi</td><td>:</td><td><?php echo $date_rev; ?></td></tr>
    <tr><td>Keterangan Revisi</td><td>:</td><td><?php echo $rev_ct; ?></td></tr>
    <tr><td>Tanggal Koreksi</td><td>:</td><td><?php echo $date_cor; ?></td></tr>
    <tr><td>Keterangan Koreksi</td><td>:</td><td><?php echo $cor_ct; ?></td></tr>
    <tr><td>Tanggal Tandatangan</td><td>:</td><td><?php echo $date_ttd; ?></td></tr>
    <tr><td>Keterangan Tandatangan</td><td>:</td><td><?php echo $ttd_ct; ?></td></tr>
    <tr><td>Tanggal Selesai</td><td>:</td><td><?php echo $date_sls; ?></td></tr>
    <tr><td>Keterangan Selesai</td><td>:</td><td><?php echo $sls_ct; ?></td></tr>
    <tr><td>Unduh Dokumen</td><td>:</td><td><a href="<?php echo base_url('Pks/read_pdf/'.$kd_pks)?>" target="_blank">
    <i class="fa fa-file-text-o"></i>
    <?php echo $nm_pks.'/'.$nm_instansi.'.pdf'?>
    </a></td></tr>
    </table>
</div>
</div>
</div>
</div>
<footer class="main-footer">
    <div class="container">
      
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
</body>
</html>