<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
	<link rel="stylesheet" href="tambah.css">
</head>

<body>
	<h1 align="center">EDIT DATA MAHASISWA</h1> <br>
 
	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"SELECT * FROM inputmhs where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="aksi_edit.php">
			<table>
				<tr>			
					<td>Nama</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
						<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td>NIM</td>
					<td><input type="number" name="nim" value="<?php echo $d['nim']; ?>"></td>
				</tr>
				<tr>
					<td>Umur</td>
					<td><input type="text" name="umur" value="<?php echo $d['umur']; ?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td><input type="text" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin']; ?>"></td>
				</tr>
				<tr>
					<td>Program Studi</td>
					<td><input type="text" name="prodi" value="<?php echo $d['prodi']; ?>"></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td><input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>"></td>
				</tr>
				<tr>
					<td>Asal Kota</td>
					<td><input type="text" name="asal_kota" value="<?php echo $d['asal_kota']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
				<tr>
					<td></td>
					<td><a href="index.php" class="button">Kembali</a></td>
				</tr>
			</table>
		</form>
		<?php 
	}
	?>

</body>
</html>