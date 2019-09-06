<?php
	$this->load->view('pks/pks');
?>
<html>
<head>
	<title>Daftar Porjek PKS</title>
</head>
<body>
	<table border="1" id="dataPKS">
		<th>Nama Istansi</th>
		<th>Jenis PKS</th>
		<th>Asal PKS</th>
		<th>Jangka Waktu</th>
		<th>PIC</th>
		<th>Action</th>
	</table>
</div>
</div>
</div>
<script>
	$(document).ready(function(){
   $('#dataPKS').DataTable({
	  'order': [[ 0, "desc" ]],
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'<?php echo base_url().'monitor/dt_tbl'?>'
      },
      'columns': [
         { data: 'action' }
      ]
	});
	});
</script>
</body>
</html>