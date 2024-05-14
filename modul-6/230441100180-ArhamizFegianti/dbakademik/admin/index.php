<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>	
  <?php
    session_start();
    if ($_SESSION['status']!="login"){
      header ("location:../index.php?pesan=Login");
    }
  ?>
<div class="header">
  <h2 align="center">CRUD DATA MAHASISWA</h2> <br> <hr>
  <br>
  <h4>Selamat datang, <?php echo $_SESSION['username'];?> ! Anda berhasil login.</h4>
  <p>Ini adalah halaman admin.</p>
</div>

  <table border="2">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Umur</th>
      <th>Jenis Kelamin</th>
      <th>Prodi</th>
      <th>Jurusan</th>
      <th>Asal Kota</th>
			<th>Opsi</th>
		</tr>

    <?php
      include "koneksi.php";
      $no = 1;
      $data = mysqli_query($koneksi, "SELECT * FROM inputmhs");
      while ($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $d["nama"]++;?></td>
          <td><?php echo $d["nim"]++;?></td>
          <td><?php echo $d["umur"]++;?></td>
          <td><?php echo $d["jenis_kelamin"]++;?></td>
          <td><?php echo $d["prodi"]++;?></td>
          <td><?php echo $d["jurusan"]++;?></td>
          <td><?php echo $d["asal_kota"]++;?></td>
          <td>
            <a href="edit.php? id=<?php echo $d ["id"];?>">Edit</a>
            <a href="hapus.php? id=<?php echo $d ["id"];?>">Hapus</a>
          </td>
        </tr>
        <?php
      }
    ?>
	</table> <br>

        <a href="tambah.php" class="button">Tambah Data</a> <br> <br>
        <a href="logout.php" class="button">LOGOUT</a>
</body>
</html>