<?php
	$this->load->view('jdih/jdih');
?>
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

    <div class="container">
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Sunting Projek PKS</h3>
	</div>
	<form role= "form" action="<?php echo base_url().'Jdih/update_action';?>" method="POST" enctype="multipart/form-data">
	<div class="box-body">
    <div class="form-group">
		<label for="r_lingkup">Ruang Lingkup</label>
		<select name="r_lingkup" class="form-control" id="r_lingkup">
			<option value="">--Pilih Ruang Lingkup</option>
			<option value="1" <?php echo ($r_lingkup == '1')?'selected':''?>>Nasional</option>
			<option value="2" <?php echo ($r_lingkup == '2')?'selected':''?>>Internal RS</option>
		</select>
    </div>
	<div class="form-group">
		<label for="jns_prtn">Jenis Peraturan</label>
		<input class="form-control" type="text" name="jns_prtn" id="jns_prtn" placeholder="Jenis Peraturan" value="<?php echo $jns_prtn?>">
		<!-- <select name="jns_prtn" class="form-control" id="jns_prtn">
			<option value="">--Pilih Jenis Peraturan</option>
			<option value="1" <?php //echo ($jns_prtn == '1')?'selected':''?>>Undang - Undang</option>
			<option value="2" <?php //echo ($jns_prtn == '2')?'selected':''?>>Peraturan Pemerintah</option>
			<option value="3" <?php //echo ($jns_prtn == '3')?'selected':''?>>Perpres</option>
			<option value="4" <?php //echo ($jns_prtn == '4')?'selected':''?>>Permenkes</option>
			<option value="5" <?php //echo ($jns_prtn == '5')?'selected':''?>>Kepmenkes</option>
			<option value="6" <?php //echo ($jns_prtn == '6')?'selected':''?>>Keppres</option>
			<option value="7" <?php //echo ($jns_prtn == '7')?'selected':''?>>Inpres</option>
			<option value="8" <?php //echo ($jns_prtn == '8')?'selected':''?>>Perdir</option>
			<option value="9" <?php //echo ($jns_prtn == '9')?'selected':''?>>SK</option>
			<option value="10" <?php //echo ($jns_prtn == '10')?'selected':''?>>SE</option>
			<option value="11" <?php //echo ($jns_prtn == '11')?'selected':''?>>DLL</option>
		</select> -->
	</div>
	<div class="form-group"	>
		<label for="th_prtn">Tahun Terbit Peraturan</label>
		<input class="form-control" type="text" name="th_prtn" id="th_prtn" placeholder="Tahun Terbit Peraturan" value="<?php echo $th_prtn?>">
	</div>
	<div class="form-group">
		<label for="nmr_prtn">Nomor Peraturan</label>
		<input class="form-control" type="text" name="nmr_prtn" id="nmr_prtn" placeholder="Nomor Peraturan" value="<?php echo $nmr_prtn?>">
	</div>
	<div class="form-group">
		<label for="nm_prtn">Nama Peraturan</label>
		<input class="form-control" type="text" name="nm_prtn" id="nm_prtn" placeholder="Nama Peraturan" value="<?php echo $nm_prtn?>">
	</div>
	<div class="form-group">
		<label for="sts_prtn">Status Peraturan</label>
		<select class="form-control" name="sts_prtn" id="sts_prtn">
			<option value="">--Pilih Status Peraturan--</option>
			<option value="1" <?php echo ($sts_prtn == '1')?'selected':''?>>Berlaku</option>
			<option value="2" <?php echo ($sts_prtn == '2')?'selected':''?>>Tidak Berlaku</option>
		</select>
	</div>
	<div class="form-group">
		<label for="stru_prtn">Struktural</label>
		<input class="form-control" type="text" name="stru_prtn" id="stru_prtn" placeholder="Struktural" value="<?php echo $stru_prtn?>">
	</div>
	<div class="form-group">
		<label for="doc">Upload Dokumen</label>
		<input class="form-control" type="file" name="data" id="doc" value="lanjut"><?php echo $nm_prtn.'.pdf'?>
	</div>
	<div class="form-group">
		<input type="hidden" name="kd_jdih" id="kd_jdih" value="<?php echo $kd_jdih?>">
		<input type='submit' name='submit' value='Simpan' class="btn btn-primary"/>
		<a href="<?php echo base_url('Jdih/list_jdih') ?>" class="btn btn-danger">Batal</a>
	</div>
	</form>
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
    $("#jns_prtn").autocomplete({
        source: "<?php echo base_url('Jdih/autojenis'); ?>",
		minLength:1
    });
});
$(function() {
    $("#strkl").autocomplete({
        source: "<?php echo base_url('Jdih/autostrk'); ?>",
		minLength:1
    });
});
</script>
</body>
</html>