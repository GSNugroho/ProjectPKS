<?php
	$this->load->view('pks/pks');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css')?>"/>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js')?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js')?>"></script>
<style>
	.link
{
   color:#333;
   text-decoration: none; 
   background-color: none;
}
.pesan{
    display: none;
    position: fixed;
    border: 1px solid greenyellow;
    width: 200px;
    top: 85px;
    left: 500px;
    padding: 5px 10px;
    background-color: #00a65a;
    text-align: center;
	color: white;
	}
	.pesans{
    display: none;
    position: fixed;
    border: 1px solid red;
    width: 200px;
    top: 95px;
    left: 500px;
    padding: 5px 10px;
    background-color: #f56954;
    text-align: center;
	color: white;
	}
</style>
<div class="box box-info">
		<?php
            if (($this->session->userdata('message')) <> '') {
                echo '<div class="pesan">'.$this->session->userdata('message').'</div>';
			}
			if (($this->session->userdata('messages')) <> '') {
                echo '<div class="pesans">'.$this->session->userdata('messages').'</div>';
            }
        ?>
    <div class="box-header with-border">
        <h3 class="box-title">Data Proyek PKS</h3>
	</div>
<p>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('Pks/export') ?>">Export ke Excel</a></p>
<p>&nbsp;&nbsp;&nbsp;Tanggal Mulai</p>
<table style="margin-left: 10px">
     <tr>
       <td>
	   <input type="text" class="form-control" name="rtm_waktu" id="tgl1"placeholder="dd-mm-yyyy"/>
	   <!-- <input type="date" class="form-control" name="rtm-waktu" id="tgl1"> -->
	   </td>
	   <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
       <td>
	   <input type="text" class="form-control" name="rta_waktu" id="tgl2" placeholder="dd-mm-yyyy"/>	
	   <!-- <input type="date" class="form-control" name="rta_waktu" id="tgl2"> -->
       </td>
     </tr>
   </table>
<div class="box-body">
	<table id="dataPKS" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th>Nama PKS</th>
		<th>Nama Instansi</th>
		<th>Jenis</th>
		<th>Asal</th>
		<th>Tanggal Mulai</th>
		<th>Tanggal Akhir</th>
		<th>Status Pengerjaan</th>
		<th>PIC</th>
		<th>Tindakan</th>
		</tr>
		</thead>
	</table>
</div>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<script>
$(document).ready(function(){
   var table = $('#dataPKS').DataTable({
	language: {
		"sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
		"sProcessing":   "Sedang memproses...",
		"sLengthMenu":   "Tampilkan _MENU_ entri",
		"sZeroRecords":  "Tidak ditemukan data yang sesuai",
		"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
		"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
		"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
		"sInfoPostFix":  "",
		"sSearch":       "Cari:",
		"sUrl":          "",
		"oPaginate": {
			"sFirst":    "Pertama",
			"sPrevious": "Sebelumnya",
			"sNext":     "Selanjutnya",
			"sLast":     "Terakhir"
	}
	},
	//   'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'Pks/tbl_list'?>',
		  'data': function(data){
          // Read values
          var awal = $('#tgl1').val();
          var akhir = $('#tgl2').val();

          // Append to data
          data.searchByAwal = awal;
          data.searchByAkhir = akhir;
      	}
	  },
      'columns': [
		 { data: 'nm_pks' },
		 { data: 'nm_instansi' },
		 { data: 'jns_pks' },
		 { data: 'asal_pks' },
		 { data: 'tgl_mulai' },
		 { data: 'tgl_akhir' },
		 { data: 'prsn_pks'},
		 { data: 'pic_pks' },
         { data: 'action' }
      ]
	});

  	$('#tgl2').on('dp.change', function(){
    table.draw(true);
  	});

	$('#dataPKS').on('dblclick', 'tr', function () {
        var data = table.row( this ).data();
        // alert( 'Untuk mengedit status '+data['nm_instansi']+' tolong pilih tombol warna hijau ' );
		window.location = $(this).closest('tr').find('td:eq(0) a').attr('href');
    } );

	});
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 0);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
	
	$(document).ready(function(){setTimeout(function(){$(".pesans").fadeIn('slow');}, 0);});
    setTimeout(function(){$(".pesans").fadeOut('slow');}, 3000);

	$(function() { 
  	$('#tgl1').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	});

	// $('#tgl1').datetimepicker({
	// 	onSelect: function(dateText) {
    // }, locale:'id',format : "DD-MM-YYYY"
	// });

	$(function() { 
  	$('#tgl2').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	});

	// $('#tgl2').datetimepicker({
	// 	onSelect: function(dateText) {
    // }, locale:'id',format : "DD-MM-YYYY"
	// });

</script>
</div>
</div>
</div>
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.4.18 -->
      </div>
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
    </div>
     <!-- /.container -->
   </footer>
</div>
</body>
</html>