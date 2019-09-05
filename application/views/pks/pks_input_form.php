<?php
	$this->load->view('pks/pks');
?>
<html>
<head>
	<title>Tambah PKS</title>
</head>
<body>
<div id="fh5co-intro">
			<div class="row animate-box">
				<div class="col-md-12 col-md-offset-0 text-center">
					<!-- <h2>Living in God's Amazing Grace!</h2> -->
					<form action="<?php echo base_url().'Pks/create_action';?>" method="POST">
	<table>
		<tr>
		<td><label for="nm_istansi">Nama Istansi</label></td>
		<td><input class="form-control" type="text" name="nm_istansi" id="nm_istansi" placeholder="Nama Istansi"></td>
		</tr>
		<tr>
		<td><label for="jns_pks">Jenis PKS</label></td>
		<td><select name="jns_pks" class="form-control" id="jns_pks">
			<option value="">--Pilih Jenis PKS</option>
			<option value="1">Manajerial</option>
			<option value="2">Medis</option>
		</select>
		</td>
		</tr>
		<tr>
		<td><label for="des_pks">Deskripsi PKS</label></td>
		<td><textarea class="form-control" rows="3" name="des_pks" id="des_pks" placeholder="Deskripsi PKS"></textarea></td>
		</tr>
		<tr>
		<td><label for="asal_pks">Asal Permohonan PKS</label></td>
		<td><input class="form-control" type="text" name="asal_pks" id="asal_pks" placeholder="Asal Permohonan PKS"></td>
		</tr>
		<tr>
		<td><label for="r_waktu">Rencana Jangka Waktu PKS</label></td>
		<td><input class="form-control" type="text" name="r_waktu" id="r_waktu" placeholder="Rencana Jangka Waktu PKS"></td>
		<td><label for="rtm_waktu">Rencana Tanggal Mulai PKS</label></td>
		<td><input class="form-control" type="date" name="rtm_waktu" id="rtm_waktu" placeholder="Rencana Tanggal Mulai PKS"></td>
		<td><label for="rta_waktu">Rencana Tanggal Akhir PKS</label></td>
		<td><input class="form-control" type="date" name="rta_waktu" id="rta_waktu" placeholder="Rencana Tanggal Akhir PKS"></td>
		</tr>
		<tr>
		<td><label for="pic">PIC</label></td>
		<td><input class="form-control" type="text" name="pic" id="pic" placeholder="PIC"></td>
		</tr>
		<tr>
		<td><button type="submit" class="btn btn-primary">Simpan</button></td>
		</tr>
	</table>
	</form>
				</div>
			</div>
		</div>
</div>
</body>
</html>