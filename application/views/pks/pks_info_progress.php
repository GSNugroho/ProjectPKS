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
            echo '<tr><td>Tanggal Revisi</td><td>:</td><td>'.$date_rev.'</td></tr>
                    <tr><td>Catatan Revisi</td><td>:</td><td>'.$rev_ct.'</td>
                    </tr>';
        }elseif($param == 2){
            echo '<tr><td>Tanggal Koreksi</td><td>:</td><td>'.$date_cor.'</td></tr>
                    <tr><td>Catatan Koreksi</td><td>:</td><td>'.$cor_ct.'</td>
                    </tr>';
        }elseif($param == 3){
            echo '<tr><td>Tanggal Tanda Tangan</td><td>:</td><td>'.$date_ttd.'</td></tr>
                    <tr><td>Catatan Tanda Tangan</td><td>:</td><td>'.$ttd_ct.'</td>
                    </tr>';
        }elseif($param == 4){
            echo '<tr><td>Tanggal Selesai</td><td>:</td><td>'.$date_sls.'</td></tr>
                    <tr><td>Catatan Selesai</td><td>:</td><td>'.$sls_ct.'</td>
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