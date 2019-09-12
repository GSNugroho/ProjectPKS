<?php
	$this->load->view('pks/pks');
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Progress PKS</h3>
    </div>
    <form role="form" action="<?php echo base_url().'PKS/proses_action';?>" method="POST">
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Revisi</th>
              <th>Koreksi</th>
              <th>Tanda Tangan</th>
              <th>Selesai</th>
            </tr>
          </thead>
          <tr>
            <?php 
                if($rev_pks == 1){
                    echo '<td><input type="checkbox" name="rev_pks" id="rev_pks" align="center" checked onclick="return false;" value="1"></td>';
                }else{
                    echo '<td><input type="checkbox" name="rev_pks" id="rev_pks" align="center" value="1"></td>';
                }
                if($cor_pks == 1){
                    echo '<td><input type="checkbox" name="cor_pks" id="cor_pks" align="center" checked onclick="return false;" value="1"></td>';
                }else if($cor_pks == 2){
                    echo '<td><input type="checkbox" name="cor_pks" id="cor_pks" align="center" onclick="return false;" value="1"></td>';
                }else{
                    echo '<td><input type="checkbox" name="cor_pks" id="cor_pks" align="center" value="1"></td>';
                }
                if($ttd_pks == 1){
                    echo '<td><input type="checkbox" name="ttd_pks" id="ttd_pks" align="center" checked onclick="return false;" value="1"></td>';
                }else if($ttd_pks == 2){
                    echo '<td><input type="checkbox" name="ttd_pks" id="ttd_pks" align="center" onclick="return false;" value="1"></td>';
                }else{
                    echo '<td><input type="checkbox" name="ttd_pks" id="ttd_pks" align="center" value="1"></td>';
                }
                if($sls_pks == 1){
                    echo '<td><input type="checkbox" name="sls_pks" id="sls_pks" align="center" checked onclick="return false;" value="1"></td>';
                }else if($sls_pks == 2){
                    echo '<td><input type="checkbox" name="sls_pks" id="sls_pks" align="center" onclick="return false;" value="1"></td>';
                }else{
                    echo '<td><input type="checkbox" name="sls_pks" id="sls_pks" align="center" value="1"></td>';
                }
            ?>
          </tr>
        </table>
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