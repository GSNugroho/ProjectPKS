<?php
	$this->load->view('pks/pks');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/buttons.dataTables.min.css')?>">
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
<!-- <p>&nbsp;&nbsp;&nbsp;<a href="<?php //echo base_url('Pks/export') ?>">Export ke Excel</a></p> -->
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
	 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	 <tr>
		 <td>
			 <div class="form-group">
				 <select id="jenis" class="form-control">
					 <option value="">--Jenis--</option>
					 <option value="1">Manajerial</option>
					 <option value="2">Klinis</option>
				 </select>
			 </div>
		 </td>
		 <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		 <td>
			  <div class="form-group">
				  <select id="prsn" class="form-control">
					  <option value="">Status</option>
					  <option value="0">0%</option>
					  <option value="25">25%</option>
					  <option value="50">50%</option>
					  <option value="75">75%</option>
				  </select>
			  </div>
		 </td>
	 </tr>
   </table>
<div class="box-body">
	<table id="dataPKS" class="table table-bordered table-striped">
		<thead>
		<tr>
		<th width='20%'>Nama PKS</th>
		<th width='10%'>Nama Instansi</th>
		<th width='10%'>Jenis</th>
		<th width='15%'>Asal</th>
		<th width='10%'>Tanggal Mulai</th>
		<th width='10%'>Tanggal Akhir</th>
		<th width='5%'>Status Pengerjaan</th>
		<th width='5%'>PIC</th>
		<th width='15%'>Tindakan</th>
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
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/jszip.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/buttons.flash.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/buttons.html5.min.js')?>"></script>
<script>
$(document).ready(function(){
   var table = $('#dataPKS').DataTable({
	dom: 'lBfrtip',
    buttons: [
		{
			extend : 'excelHtml5',
			text : 'Export Data ke Excel',
			title : 'Daftar Proyek PKS',
			exportOptions : {
				columns: [0, 1, 2, 3, 4, 5, 6, 7]
			}
			},
        ],
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
		  var jns = $('#jenis').val();
		  var prsn = $('#prsn').val();

          // Append to data
          data.searchByAwal = awal;
          data.searchByAkhir = akhir;
		  data.searchByJenis = jns;
		  data.searchByPrsn = prsn;
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

	$('#jenis').on('change', function(){
		table.draw(true);
	});

	$('#prsn').on('change', function(){
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

	$(function() { 
  	$('#tgl2').datetimepicker({locale:'id',format : "DD-MM-YYYY"});
	});

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