<?php
	$this->load->view('pks/pks');
?>
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css')?>"/>
	<script src="<?php echo base_url('assets/datepicker/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js')?>"></script>

<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Tambah PKS</h3>
	</div>
		
	<form role="form" action="<?php echo base_url().'Pks/create_action';?>" method="POST">
	<div class="box-body">
	<div class="form-group">
		<label for="nm_pks">Nama PKS</label>
		<input class="form-control" type="text" name="nm_pks" id="nm_pks" placeholder="Nama PKS">
	</div>
    <div class="form-group">
		<label for="nm_instansi">Nama Istansi</label>
		<input class="form-control" type="text" name="nm_instansi" id="nm_instansi" placeholder="Nama Istansi">
    </div>
	<div class="form-group">
		<label for="jns_pks">Jenis PKS</label>
		<select name="jns_pks" class="form-control" id="jns_pks">
			<option value="">--Pilih Jenis PKS</option>
			<option value="1">Menejerial</option>
			<option value="2">Medis</option>
		</select>
	</div>
	<div class="form-group">
		<label for="des_pks">Deskripsi PKS</label>
		<textarea class="form-control" rows="3" name="des_pks" id="des_pks" placeholder="Deskripsi PKS"></textarea>
	</div>
	<div class="form-group">
		<label for="asal_pks">Asal Permohonan PKS</label>
		<input class="form-control" type="text" name="asal_pks" id="asal_pks" placeholder="Asal Permohonan PKS">
	</div>
	<div class="form-group">
		<label for="rtm_waktu">Rencana Tanggal Mulai PKS</label>
	<div class="input-group date" id="tgl1">
		<input type="text" class="form-control" name="rtm_waktu" placeholder="dd-mm-yyyy"/>	
		<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	</div>
	</div>
	<div class="form-group">
		<label for="rtm_waktu">Rencana Tanggal Akhir PKS</label>
	<div class="input-group date" id="tgl2">
		<input type="text" class="form-control" name="rta_waktu" placeholder="dd-mm-yyyy"/>	
		<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	</div>
	</div>
	<div class="form-group">
		<label for="pic">PIC</label>
		<input class="form-control" type="text" name="pic" id="pic" placeholder="PIC">
	</div>
	<div class="form-group">
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
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.4.18 -->
      </div>
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
    </div>
     <!-- /.container -->
   </footer> 
</div>
<script>
	$(function() { 
  	$('#tgl1').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	});
	$(function() { 
  	$('#tgl2').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	});
</script>
</body>
</html>