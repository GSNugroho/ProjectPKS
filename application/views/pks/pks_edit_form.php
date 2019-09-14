<?php
	$this->load->view('pks/pks');
?>
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Tambah Projek PKS</h3>
	</div>
		
	<form role="form" action="<?php echo base_url().'Pks/update_action';?>" method="POST">
	<div class="box-body">
    <div class="form-group">
		<label for="nm_instansi">Nama Istansi</label>
		<input class="form-control" type="text" name="nm_instansi" id="nm_instansi" placeholder="Nama Istansi" value="<?php echo $nm_instansi?>">
    </div>
	<div class="form-group">
		<label for="jns_pks">Jenis PKS</label>
		<select name="jns_pks" class="form-control" id="jns_pks">
			<option value="">--Pilih Jenis PKS</option>
			<option value="1" <?php echo ($jns_pks == '1')?'selected':''?>>Menejerial</option>
			<option value="2" <?php echo ($jns_pks == '2')?'selected':''?>>Medis</option>
		</select>
	</div>
	<div class="form-group">
		<label for="des_pks">Deskripsi PKS</label>
		<textarea class="form-control" rows="3" name="des_pks" id="des_pks" placeholder="Deskripsi PKS"><?php echo $des_pks?></textarea>
	</div>
	<div class="form-group">
		<label for="asal_pks">Asal Permohonan PKS</label>
		<input class="form-control" type="text" name="asal_pks" id="asal_pks" placeholder="Asal Permohonan PKS" value="<?php echo $asal_pks?>">
	</div>
	<div class="form-group">
		<label for="rtm_waktu">Rencana Tanggal Mulai PKS</label>
		<input class="form-control" type="date" name="rtm_waktu" id="rtm_waktu" placeholder="Rencana Tanggal Mulai PKS" value="<?php echo $tgl_mulai?>">
	</div>
	<div class="form-group">
		<label for="rta_waktu">Rencana Tanggal Akhir PKS</label>
		<input class="form-control" type="date" name="rta_waktu" id="rta_waktu" placeholder="Rencana Tanggal Akhir PKS" value="<?php echo $tgl_akhir?>">
	</div>
	<div class="form-group">
		<label for="pic">PIC</label>
		<input class="form-control" type="text" name="pic" id="pic" placeholder="PIC" value="<?php echo $pic_pks?>">
	</div>
	<div class="form-group">
		<input type="hidden" name="kd_pks" id="kd_pks" value="<?php echo $kd_pks?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url('Pks/list_pks') ?>" class="btn btn-danger">Batal</a>
	</div>
	</form>
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