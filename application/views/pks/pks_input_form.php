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
	
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jquery-ui/themes/smoothness/jquery-ui.css')?>">
	<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.js')?>"></script>

	<style>
       .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            /* add padding to account for vertical scrollbar */
            padding-right: 20px;
        } 
	</style>

<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Tambah PKS</h3>
	</div>
		
	<form role="form" action="<?php echo base_url().'Pks/create_action';?>" method="POST" enctype="multipart/form-data">
	<div class="box-body">
	<div class="form-group">
		<label for="nm_pks">Nama PKS </label><?php echo form_error('nm_pks')?>
		<input class="form-control" type="text" name="nm_pks" id="nm_pks" placeholder="Nama PKS" value="<?php echo $nm_pks?>">
	</div>
    <div class="form-group">
		<label for="nm_instansi">Nama Istansi </label><?php echo form_error('nm_instansi')?>
		<input class="form-control" type="text" name="nm_instansi" id="nm_instansi" placeholder="Nama Istansi" value="<?php echo $nm_instansi?>">
		<input type="hidden" name="id_instansi" id="id_instansi">
    </div>
	<div class="form-group">
		<label for="jns_pks">Jenis PKS</label> <?php echo form_error('jns_pks')?>
		<select name="jns_pks" class="form-control" id="jns_pks">
			<option value="">--Pilih Jenis PKS</option>
			<option value="1" <?php echo ($jns_pks == '1')?'selected':''?>>Menejerial</option>
			<option value="2" <?php echo ($jns_pks == '2')?'selected':''?>>Medis</option>
		</select>
	</div>
	<div class="form-group">
		<label for="des_pks">Deskripsi PKS </label><?php echo form_error('des_pks')?>
		<textarea class="form-control" rows="3" name="des_pks" id="des_pks" placeholder="Deskripsi PKS"><?php echo $des_pks?></textarea>
	</div>
	<div class="form-group">
		<label for="asal_pks">Asal Permohonan PKS </label><?php echo form_error('asal_pks')?>
		<input class="form-control" type="text" name="asal_pks" id="asal_pks" placeholder="Asal Permohonan PKS" value="<?php echo $asal_pks?>">
	</div>
	<div class="form-group">
		<label for="rtm_waktu">Rencana Tanggal Mulai PKS </label><?php echo form_error('tgl_mulai')?>
	<div class="input-group date" id="tgl1">
		<input type="text" class="form-control" name="rtm_waktu" placeholder="dd-mm-yyyy" value="<?php echo $tgl_mulai?>"/>	
		<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	</div>
	</div>
	<div class="form-group">
		<label for="rtm_waktu">Rencana Tanggal Selesai PKS </label><?php echo form_error('tgl_akhir')?>
	<div class="input-group date" id="tgl2">
		<input type="text" class="form-control" name="rta_waktu" placeholder="dd-mm-yyyy" value="<?php echo $tgl_akhir?>"/>	
		<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	</div>
	</div>
	<div class="form-group">
		<label for="pic">PIC </label><?php echo form_error('pic_pks')?>
		<input class="form-control" type="text" name="pic" id="pic" placeholder="PIC" value="<?php echo $pic_pks?>">
	</div>
	<div class="form-group">
		<label for="doc">Upload Dokumen </label><?php echo form_error('data_pks')?>
		<input class="form-control" type="file" name="dok_pks" id="doc">
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

	$(function() {
    $("#nm_instansi").autocomplete({
        source: "<?php echo base_url('Pks/autoins'); ?>",
		minLength:1,
		select: function (event, ui) {
                    $('[name="nm_instansi"]').val(ui.item.value); 
                    $('[name="id_instansi"]').val(ui.item.id); 
                }
    });
});
</script>
</body>
</html>