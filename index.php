<html
<body>
	<form action="" method="POST" enctype="multipart/from=data">
	<div align="center">
	<h2>Input Data Mahasiswa</h2>
	<table border="0" cellspacing="3px" align="center">
		<tr>
			<td>NRP</td>
			<td>
			<input type="number" name="nrp"></input>
			</td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td>
			<input type="text" name="nama"></input>
			</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>
			<input type="text" name="jurusan" ></input>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin </td>
			<td>
			<input type="radio" name="jenis_kelamin" value="Pria" checked>Laki-Laki
			<input type="radio" name="jenis_kelamin" value="Perempuan" checked>Perempuan
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="SAVE">
			<input type="reset" name="reset" value="RESET"></form>
		<form action="parsing.php" method="post" enctype="multipart/form-data">
			<input type="submit" name="submit" value="LOAD">
			<input type="file" name="file"></td>
		</tr>
	</table>
	</form>
</body>
</html>

<?php
error_reporting(0);
	include 'koneksi.php';

	$nrp = $_POST["nrp"];
	$nama = $_POST["nama"];
	$jurusan = $_POST["jurusan"];
	$jenis_kelamin = $_POST["jenis_kelamin"];

if ($nrp!="" && $nama!="" && $jurusan!="" && $jenis_kelamin!="") {
	$query = "insert into mahasiswa(nrp,nama,jurusan,jenis_kelamin) values ('$nrp','$nama','$jurusan','$jenis_kelamin')";
	mysqli_query($koneksi,$query);
};


	$tab_name = "api_json";
	$query = "select * from mahasiswa";
	$result = mysql_query($koneksi,$query);
	$field_count = mysql_num_fields($result);
	$sitejson = array();

	while($data=mysql_fetch_array($result)){
		$sitejson[]=array(
			'nrp' => $data['nrp'],
			'nama' => $data['nama'],
			'jurusan' => $data['jurusan'],
			'jenis_kelamin' => $data['jenis_kelamin']);
	}
	$file = fopen('mahasiswa.json','w');
	fwrite($file,json_encode($sitejson));
	fclose($file);
?>

