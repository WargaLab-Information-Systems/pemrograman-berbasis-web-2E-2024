<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'function.php';
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
  <h2 class="Header">Data Mahasiswa</h2> <br> <br>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Nim</th>
      <th>Umur</th>
      <th>Jenis Kelamin</th>
      <th>Prodi</th>
      <th>Jurusan</th>
      <th>Asal Kota</th>
      <th>Aksi</th>
    </tr>

    <?php
    include "koneksi.php";
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM Input_Data");
    while ($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $d["nama"];?></td>
        <td><?php echo $d["nim"];?></td>
        <td><?php echo $d["umur"];?></td>
        <td><?php echo $d["jenis_klmin"];?></td>
        <td><?php echo $d["prodi"];?></td>
        <td><?php echo $d["jurusan"];?></td>
        <td><?php echo $d["asal_kota"];?></td>
        <td>
          <a href="edit.php? id=<?php echo $d ["id"];?>">Edit</a>
          <a href="hapus.php? id=<?php echo $d ["id"];?>">Hapus</a>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>
  <div class="end">
  <button><a href="tambah.php" class="tambah">Tambah Data</a></button>
  <button><a href="homepage.php" class="tambah">Log Out</a></button></div>
</body>
</html>