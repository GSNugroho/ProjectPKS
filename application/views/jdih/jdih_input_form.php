<?php
	$this->load->view('jdih/jdih');
?>
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Tambah Peraturan</h3>
	</div>
	<form role= "form" action="<?php echo base_url().'Jdih/create_action';?>" method="POST" enctype="multipart/form-data">
	<div class="box-body">
    <div class="form-group">
		<label for="r_lingkup">Ruang Lingkup</label>
		<select name="r_lingkup" class="form-control" id="r_lingkup">
			<option value="">--Pilih Ruang Lingkup</option>
			<option value="1">Nasional</option>
			<option value="2">Internal RS</option>
		</select>
    </div>
	<div class="form-group">
		<label for="jns_prtn">Jenis Peraturan</label>
		<select name="jns_prtn" class="form-control" id="jns_prtn">
			<option value="">--Pilih Jenis Peraturan</option>
			<option value="1">Undang - Undang</option>
			<option value="2">Peraturan Pemerintah</option>
			<option value="3">Perpres</option>
			<option value="4">Permenkes</option>
			<option value="5">Kepmenkes</option>
			<option value="6">Keppres</option>
			<option value="7">Inpres</option>
			<option value="8">Perdir</option>
			<option value="9">SK</option>
			<option value="10">SE</option>
			<option value="11">DLL</option>
		</select>
	</div>
	<div class="form-group"	>
		<label for="th_prtn">Tahun Terbit Peraturan</label>
		<input class="form-control" type="text" name="th_prtn" id="th_prtn" placeholder="Tahun Terbit Peraturan">
	</div>
	<div class="form-group">
		<label for="nmr_prtn">Nomor Peraturan</label>
		<input class="form-control" type="text" name="nmr_prtn" id="nmr_prtn" placeholder="Nomor Peraturan">
	</div>
	<div class="form-group">
		<label for="nm_prtn">Nama Peraturan</label>
		<input class="form-control" type="text" name="nm_prtn" id="nm_prtn" placeholder="Nama Peraturan">
	</div>
	<div class="form-group">
		<label for="sts_prtn">Status Peraturan</label>
		<select class="form-control" name="sts_prtn" id="sts_prtn">
			<option value="">--Pilih Status Peraturan--</option>
			<option value="1">Berlaku</option>
			<option value="2">Tidak Berlaku</option>
		</select>
	</div>
	<div class="form-group">
		<label for="strkl">Struktural</label>
		<input class="form-control" type="text" name="strkl" id="strkl" placeholder="Struktural">
	</div>
	<div class="form-group">
		<label for="doc">Upload Dokumen</label>
		<input class="form-control" type="file" name="data" id="doc">
		
	</div>
	<div class="form-group">
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
</body>
</html>