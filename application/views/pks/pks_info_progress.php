<?php
	$this->load->view('pks/pks');
?>
<div class="box box-primary">
	<div class="box-header with-border">
    	<h3 class="box-title">Rincian Progres</h3>
	</div>
		
	<div class="box-body">
    <a href="<?php echo base_url('Pks/progress') ?>" class="btn btn-danger">Kembali</a>   
    <table>
    <?php
        if($param == 1){
            echo '<tr><td>Tanggal Revisi&nbsp;</td><td>:</td><td>&nbsp;'.$date_rev.'</td></tr>
                    <tr><td>Catatan Revisi&nbsp;</td><td>:</td><td>&nbsp;'.$rev_ct.'</td></tr>
                    <tr><td>User Yang Melakukan Tindakan&nbsp;</td><td>:</td><td>&nbsp;'.$rev_ur.'</td>
                    </tr>';
        }elseif($param == 2){
            echo '<tr><td>Tanggal Koreksi&nbsp;</td><td>:</td><td>&nbsp;'.$date_cor.'</td></tr>
                    <tr><td>Catatan Koreksi&nbsp;</td><td>:</td><td>&nbsp;'.$cor_ct.'</td></tr>
                    <tr><td>User Yang Melakukan Tindakan&nbsp;</td><td>:</td><td>&nbsp;'.$cor_ur.'</td>
                    </tr>';
        }elseif($param == 3){
            echo '<tr><td>Tanggal Tanda Tangan&nbsp;</td><td>:</td><td>&nbsp;'.$date_ttd.'</td></tr>
                    <tr><td>Catatan Tanda Tangan&nbsp;</td><td>:</td><td>&nbsp;'.$ttd_ct.'</td></tr>
                    <tr><td>User Yang Melakukan Tindakan&nbsp;</td><td>:</td><td>&nbsp;'.$ttd_ur.'</td>
                    </tr>';
        }elseif($param == 4){
            echo '<tr><td>Tanggal Selesai&nbsp;</td><td>:</td><td>&nbsp;'.$date_sls.'</td></tr>
                    <tr><td>Catatan Selesai&nbsp;</td><td>:</td><td>&nbsp;'.$sls_ct.'</td></tr>
                    <tr><td>User Yang Melakukan Tindakan&nbsp;</td><td>:</td><td>&nbsp;'.$sls_ur.'</td>
                    </tr>';
        }
    ?>
    </table>
</div>
</div>
</div>
</div>
<footer class="main-footer">
    <div class="container">
      
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
</body>
</html>