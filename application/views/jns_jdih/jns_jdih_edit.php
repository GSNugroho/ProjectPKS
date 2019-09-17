<?php
	$this->load->view('jdih/jdih');
?>

    <div class="container">
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Sunting Jenis Peraturan</h3>
	</div>
	<form role= "form" action="<?php echo base_url().'Jdih/update_jns_prtn_action';?>" method="POST" enctype="multipart/form-data">
	<div class="box-body">
	<div class="form-group"	>
		<label for="jns_prtn">Jenis Peraturan</label>
		<input class="form-control" type="text" name="jns_prtn" id="jns_prtn" placeholder="Jenis Peraturan" value="<?php echo $jns_prtn?>">
	</div>
	<div class="form-group">
        <input type="hidden" name="id_jns" value="<?php echo $id_jns?>">
		<input type='submit' name='submit' value='Simpan' class="btn btn-primary"/>
		<a href="<?php echo base_url('Jdih/jns_prtn') ?>" class="btn btn-danger">Batal</a>
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
</body>
</html>