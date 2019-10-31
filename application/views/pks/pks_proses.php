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
            <th></th>
          </tr>
            <?php
              $i = 1;
              foreach($detail_proses as $row){
                if($row->d_tind == '1'){ $tind = 'Pencermatan';}else if($row->d_tind == '2'){ $tind = 'Koreksi';}
                else if($row->d_tind == '3'){ $tind = 'Tanda Tangan';}else if($row->d_tind == '4'){ $tind = 'Selesai';}
            ?>
                <tr id='row<?php echo $row->id?>'>
                  <td><?php echo $i;?></td>
                  <td><?php echo date('d-m-Y', strtotime($row->tgl_tind));?></td>
                  <td><?php echo $tind?></td>
                  <td id='ket_val<?php echo $row->id?>'><?php echo $row->ket_tind?></td>
                  <td id='pic_val<?php echo $row->id?>'><?php echo $row->pic_tind?></td>
                  <td><input type='button' id='edit_button<?php echo $row->id?>' value='Edit' class='edit' onclick="edit_row('<?php echo $row->id?>')">
                      <input type='button' id='save_button<?php echo $row->id?>' value='Save' class='save' style="display:none;" onclick="save_row('<?php echo $row->id?>')">
                  </td>
                  </tr>
                
            <?php
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

function edit_row(id)
{
 var ket = document.getElementById("ket_val"+id).innerHTML;
 var pic = document.getElementById("pic_val"+id).innerHTML;

 document.getElementById("ket_val"+id).innerHTML="<input type='text' id='ket_text"+id+"' value='"+ket+"'>";
 document.getElementById("pic_val"+id).innerHTML="<input type='text' id='pic_text"+id+"' value='"+pic+"'>";
	
 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}

function save_row(id)
{
  var ket = document.getElementById("ket_text"+id).value;
  var pic = document.getElementById("pic_text"+id).value;
  
  $.ajax
  ({
    type:'post',
    url:'<?php echo base_url('Pks/edit_tindakan')?>',
    data:{
    edit_row:'edit_row',
    row_id:id,
    ket_val:ket,
    pic_val:pic
    },
    success:function(response) {
    if(response=="success")
    {
      document.getElementById("ket_val"+id).innerHTML=ket;
      document.getElementById("pic_val"+id).innerHTML=pic;
      document.getElementById("edit_button"+id).style.display="block";
      document.getElementById("save_button"+id).style.display="none";
    }
    }
  });

}
</script>
</body>
</html>