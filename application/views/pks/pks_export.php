<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
                <th>Nama Instansi</th>
                <th>Jenis</th>
                <th>Asal</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>PIC</th>
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($isi as $row) { ?>
 
           <tr>
 
                <td><?php echo $row->nm_instansi; ?></td>
                <td><?php if($row->jns_pks == 1){echo 'Menejerial';}else{echo 'Medis';} ?></td>
                <td><?php echo $row->asal_pks; ?></td>
                <td><?php echo date('d-m-Y', strtotime($row->tgl_mulai)); ?></td>
                <td><?php echo date('d-m-Y', strtotime($row->tgl_akhir)); ?></td>
                <td><?php echo $row->pic_pks ?></td>
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>