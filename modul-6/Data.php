<!DOCTYPE html>
<html>
<head>
	<title>Data mhs</title>
	<link rel="stylesheet" href="data.css">
</head>
<body>
 
	<h2>DATA MAHASISWA</h2>
	<br/>
	<br/>
	<br/>
	<table border="1 ">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Umur</th>
			<th>Jenis_kelamin</th>
     		<th>Prodi</th>
     		<th>Jurusan</th>
     		<th>Asal_kota</th>
			<th>Aksi</th>
			
			
			 
		</tr>
		<?php 
		session_start();

		if (!isset($_SESSION['username'])) {
			header("Location: index.php");
			exit();
		}
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi, "select * from mhs");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['Nama']; ?></td>
				<td><?php echo $d['NIM']; ?></td>
				<td><?php echo $d['Umur']; ?></td>
        		<td><?php echo $d['Jenis_kelamin']; ?></td>
				<td><?php echo $d['Prodi']; ?></td>
				<td><?php echo $d['Jurusan']; ?></td>
      			<td><?php echo $d['Asal_kota']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	<center>
	<button>
    <a href="tambah.php">TAMBAH DATA MAHASISWA</a><br>
	<a href="logout.php">logout</a><br>
	</button>
	</center>
	
</body>
</html>