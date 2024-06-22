<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2304.4110.0072</title>
	<link rel="stylesheet" href="input_data.css">
</head>
<body>

    <h2>DATA MAHASISWA</h2><br>
    <h3>Edit Data Mahasiswa</h3>
	<a href="index.php">Lihat Semua Data</a>
	
    <?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from input_data where id='$id'");
	$nomor=1;
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
					<td><input type="number" name="umur" value="<?php echo $d['umur']; ?>"></td>
				</tr>
				<tr>
					<td>Jenis Kelamim</td>
					<td><input type="text" name="jenis_klmin" value="<?php echo $d['jenis_klmin']; ?>"></td>
				</tr>
				<tr>
					<td>Prodi</td>
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
			</table>
		</form>
        <a href="index.php" class="back">Kembali</a><br>
    <br>
		<?php 
	}
	?>
 
</body>
</html>
</body>
</html>