<?php
	$this->load->view('pks/pks');
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Progress PKS<?php echo '/ '.$nm_instansi.'/ '.$nm_pks;?></h3>
    </div>
    <form role="form" action="<?php echo base_url().'PKS/proses_action';?>" method="POST">
      <div class="box-body">
      <div class="form-group">
      		<label for="sts_prtn">Pilih Status</label>
          <!-- <input class="form-control" type="text" name="jns_prtn" id="jns_prtn" placeholder="Jenis Peraturan"> -->
          <select class="form-control" name="sts_pr" id="sts_pr">
            <option value="">-- Pilih Status --</option>
            <option value="1" <?php echo ($sts_tr == '1')?'selected':''?>>Revisi</option>
            <option value="2" <?php echo ($sts_tr == '2')?'selected':''?>>Koreksi</option>
            <option value="3" <?php echo ($sts_tr == '3')?'selected':''?>>Tanda Tangan</option>
            <option value="4" <?php echo ($sts_tr == '4')?'selected':''?>>Selesai</option>
          </select>
        </div>
      <div class="form-group">
          <label for="ct_sts">Catatan</label>
          <!-- <textarea class="form-control" rows="3" name="ct_sts" id="ct_sts" placeholder="Catatan"><?php //echo $ct_tr?></textarea> -->
          <input class="form-control" name="ct_sts" id="ct_sts" placeholder="Catatan" value="<?php echo $ct_tr?>">
      </div>
      <!-- <div class="form-group">
          <label for="user">Yang Melakukan Tindakan</label>
          <input class="form-control" name="user" id="user" placeholder="Yang Melakukan Tindakan" value="<?php echo $ur_tr?>">
      </div> -->
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
<script>
  $(document).ready(function(){
    $("#sts_pr").change(function(){
        var $comboValue = $(this).val();
        if($comboValue == "1"){
         
            //Dynamically create the textbox
            //var $template = "<input type='text' name='HOLYDAY' id='HOLYDAY' placeholder='HOLYDAY' />";
            
            // $(this).parent().append($template);
        document.getElementById('ct_sts').value = "<?php echo $rev_ct?>";
        } 
        else if($comboValue == "2") {
          document.getElementById('ct_sts').value = "<?php echo $cor_ct?>";
        }
        else if($comboValue == "3") {
          document.getElementById('ct_sts').value = "<?php echo $ttd_ct?>";
        }
        else if($comboValue == "4") {
          document.getElementById('ct_sts').value = "<?php echo $sls_ct?>";
        }
        else {
            // $("#HOLYDAY").remove();  
            document.getElementById("ct_sts").value = "";  
        }
    });
});
</script>
</body>
</html>