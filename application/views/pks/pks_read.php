<?php
	$this->load->view('pks/pks');
?>
<div class="box box-info">
	<div class="box-header with-border">
    	<h3 class="box-title">Data Proyek PKS</h3>
	</div>
		
	<div class="box-body">
    <a href="<?php echo base_url('Pks/list_pks') ?>" class="btn btn-danger">Kembali</a>   
    <table>
    <tr><td>Nama Instansi</td><td>:</td><td><?php echo $nm_instansi; ?></td></tr>
    <tr><td>Jenis PKS</td><td>:</td><td><?php echo $jns_pks; ?></td></tr>
    <tr><td>Deskripsi PKS</td><td>:</td><td><?php echo $des_pks; ?></td></tr>
    <tr><td>Asal Permohonan PKS</td><td>:</td><td><?php echo $asal_pks; ?></td></tr>
    <tr><td>Tanggal Mulai PKS</td><td>:</td><td><?php echo $tgl_mulai; ?></td></tr>
    <tr><td>Tanggal Selesai PKS</td><td>:</td><td><?php echo $tgl_akhir; ?></td></tr>
    <tr><td>PIC</td><td>:</td><td><?php echo $pic_pks; ?></td></tr>
    </table>
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
              if($row->d_tind == '1'){ $tind = 'Pencermatan';}
              else if($row->d_tind == '2'){ $tind = 'Koreksi';}
              else if($row->d_tind == '3'){ $tind = 'Tanda Tangan';}
              else if($row->d_tind == '4'){ $tind = 'Selesai';}
              echo "<tr><td>".$i."</td><td>".date('d-m-Y', strtotime($row->tgl_tind))."</td><td>".$tind."</td><td>".$row->ket_tind."</td><td>".$row->pic_tind."</td></tr>";
              $i++;
            }
          ?>
      </table>
    </div>
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