<?php
	$this->load->view('pks/pks');
?>
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Data Projek PKS</h3>
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
    <tr><td>Tanggal Koreksi</td><td>:</td><td><?php echo $date_rev; ?></td></tr>
    <tr><td>Tanggal Tandatangan</td><td>:</td><td><?php echo $date_rev; ?></td></tr>
    <tr><td>Tanggal Selesai</td><td>:</td><td><?php echo $date_sls; ?></td></tr>
    </table>
</div>
</div>
</div>
</div>
</div>
</body>
</html>