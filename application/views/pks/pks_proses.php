<?php
	$this->load->view('pks/pks');
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Progress Proyek PKS<?php echo '/ '.$nm_instansi.'/ '.$nm_pks;?></h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Tindakan</th>
            <th>Keterangan</th>
            <th>PIC</th>
          </tr>
            <?php
              $i = 1;
              foreach($detail_proses as $row){
                if($row->d_tind == '1'){ $tind = 'Pencermatan';}else if($row->d_tind == '2'){ $tind = 'Koreksi';}
                else if($row->d_tind == '3'){ $tind = 'Tanda Tangan';}else if($row->d_tind == '4'){ $tind = 'Selesai';}
                echo "<tr><td>".$i."</td><td>".date('d-m-Y', strtotime($row->tgl_tind))."</td><td>".$tind."</td><td>".$row->ket_tind."</td><td>".$row->pic_tind."</td></tr>";
                $i++;
              }
            ?>
        </table>
      </div>
      <form role="form" action="<?php echo base_url().'Pks/proses_action';?>" method="POST">
      <div class="form-group">
      		<label for="sts_prtn">Status</label>
          <!-- <input class="form-control" type="text" name="jns_prtn" id="jns_prtn" placeholder="Jenis Peraturan"> -->
          <select class="form-control" name="sts_pr" id="sts_pr">
            <option value="">-- Status --</option>
            <option value="1">Pencermatan</option>
            <option value="2">Koreksi</option>
            <option value="3">Tanda Tangan</option>
            <option value="4">Selesai</option>
          </select>
        </div>
      <div class="form-group">
          <label for="ct_sts">Catatan</label>
          <!-- <textarea class="form-control" rows="3" name="ct_sts" id="ct_sts" placeholder="Catatan"><?php //echo $ct_tr?></textarea> -->
          <input class="form-control" name="ct_sts" id="ct_sts" placeholder="Catatan" value="">
      </div>
      <div class="form-group">
          <label for="user">PIC</label>
          <input class="form-control" name="user" id="user" placeholder="PIC" value="">
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
      <strong>Copyright &copy; 2014-2019 .</strong> All rights
      reserved.
    </div>
     <!-- /.container -->
   </footer> 
</div>
<script>
//   $(document).ready(function(){
//     $("#sts_pr").change(function(){
//         var $comboValue = $(this).val();
//         if($comboValue == "1"){
//           document.getElementById('ct_sts').value = "<?php //echo $rev_ct?>";
//           document.getElementById('user').value = "<?php //echo $rev_ur?>";
//         } 
//         else if($comboValue == "2") {
//           document.getElementById('ct_sts').value = "<?php //echo $cor_ct?>";
//           document.getElementById('user').value = "<?php //echo $cor_ur?>";
//         }
//         else if($comboValue == "3") {
//           document.getElementById('ct_sts').value = "<?php //echo $ttd_ct?>";
//           document.getElementById('user').value = "<?php //echo $ttd_ur?>";
//         }
//         else if($comboValue == "4") {
//           document.getElementById('ct_sts').value = "<?php //echo $sls_ct?>";
//           document.getElementById('user').value = "<?php //echo $sls_ur?>";
//         }
//         else {
//             document.getElementById("ct_sts").value = "";
//             document.getElementById("user").value = "";
//         }
//     });
// });
</script>
</body>
</html>