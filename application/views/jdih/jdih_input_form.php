<?php
	$this->load->view('jdih/jdih');
?>
<html>
<head>
	<title>Tambah JDIH</title>
</head>
<body>
	<form action="<?php echo base_url().'Jdih/create_action';?>" method="POST">
	<table>
		<tr>
		<td><label for="r_lingkup">Ruang Lingkup</label></td>
		<td><select name="r_lingkup" class="form-control" id="r_lingkup">
			<option value="">--Pilih Ruang Lingkup</option>
			<option value="1">Nasional</option>
			<option value="2">Internal RS</option>
		</select>
		</td>
		</tr>
		<tr>
		<td><label for="jns_prtn">Jenis Peraturan</label></td>
		<td><select name="jns_prtn" class="form-control" id="jns_prtn">
			<option value="">--Pilih Jenis Peraturan</option>
			<option value="1">Undang - Undang</option>
			<option value="2">Peraturan Pemerintah</option>
			<option value="3">Perpres</option>
			<option value="4">Permenkes</option>
			<option value="5">Kepmenkes</option>
			<option value="6">Keppres</option>
			<option value="7">Inpres</option>
			<option value="8">Perdir</option>
			<option value="9">SK</option>
			<option value="10">SE</option>
		</select>
		</td>
		</tr>
		<tr>
		<td><label for="th_prtn">Tahun Terbit Peraturan</label></td>
		<td><input class="form-control" type="text" name="th_prtn" id="th_prtn" placeholder="Tahun Terbit Peraturan"></td>
		</tr>
		<tr>
		<td><label for="nmr_prtn">Nomor Peraturan</label></td>
		<td><input class="form-control" type="text" name="nmr_prtn" id="nmr_prtn" placeholder="Nomor Peraturan"></td>
		</tr>
		<tr>
		<td><label for="nm_prtn">Nama Peraturan</label></td>
		<td><input class="form-control" type="text" name="nm_prtn" id="nm_prtn" placeholder="Nama Peraturan"></td>
		</tr>
		<tr>
		<td><label for="sts_prtn">Nama Peraturan</label></td>
		<td><select class="form-control" name="sts_prtn" id="sts_prtn">
			<option value="">--Pilih Status Peraturan--</option>
			<option value="1">Berlaku</option>
			<option value="2">Tidak Berlaku</option>
		</td>
		</tr>
		<tr>
		<td><label for="strkl">Struktural</label></td>
		<td><input class="form-control" type="text" name="strkl" id="strkl" placeholder="Struktural"></td>
		</tr>
		<tr>
		<td><label for="doc">Upload Dokumen</label></td>
		<td><input class="form-control" type="file" name="doc" id="doc" placeholder="Dokumen"></td>
		</tr>
		<tr>
		<td><button type="submit" class="btn btn-primary">Simpan</button></td>
		</tr>
	</table>
	</form>
</body>
</html>