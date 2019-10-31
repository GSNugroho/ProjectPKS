<?php
	$this->load->view('pks/pks');
?>
<div class="box box-info">
	<div class="box-header with-border">
    	<h3 class="box-title">Rincian Progres Proyek PKS</h3>
	</div>
		
	<div class="box-body">
    <a href="<?php echo base_url('Pks/progress') ?>" class="btn btn-danger">Kembali</a>   
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tanggal Tindakan</th>
            <th>Tindakan</th>
            <th>Keterangan</th>
            <th>PIC</th>
        </tr>
    <?php
        if($param == 1){
            $i=1;
            foreach($detail_proses as $row){
                if($row->d_tind == 1){
                    $tind = 'Pencermatan';
                }elseif($row->d_tind == 2){
                    $tind = 'Koreksi';
                }elseif($row->d_tind == 3){
                    $tind = 'Tanda Tangan';
                }elseif($row->d_tind == 4){
                    $tind = 'Selesai';
                }
                echo '<tr><td>'.$i.'</td><td>'.date('d-m-Y', strtotime($row->tgl_tind)).'</td><td>'.$tind.'</td><td>'.$row->ket_tind.'</td><td>'.$row->pic_tind.'<td></tr>';
                $i++;
            }
        }elseif($param == 2){
            $i=1;
            foreach($detail_proses as $row){
                if($row->d_tind == 1){
                    $tind = 'Pencermatan';
                }elseif($row->d_tind == 2){
                    $tind = 'Koreksi';
                }elseif($row->d_tind == 3){
                    $tind = 'Tanda Tangan';
                }elseif($row->d_tind == 4){
                    $tind = 'Selesai';
                }
                echo '<tr><td>'.$i.'</td><td>'.date('d-m-Y', strtotime($row->tgl_tind)).'</td><td>'.$tind.'</td><td>'.$row->ket_tind.'</td><td>'.$row->pic_tind.'<td></tr>';
                $i++;
            }
        }elseif($param == 3){
            $i=1;
            foreach($detail_proses as $row){
                if($row->d_tind == 1){
                    $tind = 'Pencermatan';
                }elseif($row->d_tind == 2){
                    $tind = 'Koreksi';
                }elseif($row->d_tind == 3){
                    $tind = 'Tanda Tangan';
                }elseif($row->d_tind == 4){
                    $tind = 'Selesai';
                }
                echo '<tr><td>'.$i.'</td><td>'.date('d-m-Y', strtotime($row->tgl_tind)).'</td><td>'.$tind.'</td><td>'.$row->ket_tind.'</td><td>'.$row->pic_tind.'<td></tr>';
                $i++;
            }
        }elseif($param == 4){
            $i=1;
            foreach($detail_proses as $row){
                if($row->d_tind == 1){
                    $tind = 'Pencermatan';
                }elseif($row->d_tind == 2){
                    $tind = 'Koreksi';
                }elseif($row->d_tind == 3){
                    $tind = 'Tanda Tangan';
                }elseif($row->d_tind == 4){
                    $tind = 'Selesai';
                }
                echo '<tr><td>'.$i.'</td><td>'.date('d-m-Y', strtotime($row->tgl_tind)).'</td><td>'.$tind.'</td><td>'.$row->ket_tind.'</td><td>'.$row->pic_tind.'<td></tr>';
                $i++;
            }
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