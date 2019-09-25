<?php
	$this->load->view('pks/pks');
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Progress PKS</h3>
    </div>
    <form role="form" action="<?php echo base_url().'PKS/proses_action';?>" method="POST">
      <div class="box-body">
      <div class="form-group">
      		<label for="sts_prtn">Pilih Status</label>
          <!-- <input class="form-control" type="text" name="jns_prtn" id="jns_prtn" placeholder="Jenis Peraturan"> -->
          <select class="form-control" name="sts_pr" id="sts_pr">
            <option value="">-- Pilih Status --</option>
            <option value="1">Revisi</option>
            <option value="2">Koreksi</option>
            <option value="3">Tanda Tangan</option>
            <option value="4">Selesai</option>
          </select>
        </div>
      <div class="form-group">
          <label for="ct_sts">Catatan</label>
          <textarea class="form-control" rows="3" name="ct_sts" id="ct_sts" placeholder="Catatan"></textarea>
      </div>
      <div class="form-group">
          <label for="user">Yang Melakukan Tindakan</label>
          <input class="form-control" name="user" id="user" placeholder="Yang Melakukan Tindakan">
      </div>
        <input type="hidden" name="kd_pks" value="<?php echo $kd_pks?>">
        <input type='submit' name='submit' value='Simpan' class="btn btn-primary"/>
        <a href="<?php echo base_url('Pks/list_pks') ?>" class="btn btn-danger">Batal</a>
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
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </div>
     <!-- /.container -->
   </footer> 
</div>
</body>
</html>