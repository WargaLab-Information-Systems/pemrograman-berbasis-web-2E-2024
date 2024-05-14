<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
<link rel="stylesheet" href="tabel.css">
</head>
<body>
  <?php
    session_start();
    if ($_SESSION['status'] != "login") {
      header("location:../index.php?pesan=BelumLogin");
    }
  ?>
  <div class="container">
    <div class="header">
      <h2>DATA MAHASISWA</h2>
      <hr>
      <br>
      <h4>Selamat datang, Admin <?php echo $_SESSION['username']; ?>!</h4>
    </div>
    <table>
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
        $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        while ($d = mysqli_fetch_array($data)) {
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d["nama"]; ?></td>
            <td><?php echo $d["nim"]; ?></td>
            <td><?php echo $d["umur"]; ?></td>
            <td><?php echo $d["kelamin"]; ?></td>
            <td><?php echo $d["prodi"]; ?></td>
            <td><?php echo $d["jurusan"]; ?></td>
            <td><?php echo $d["kota"]; ?></td>
            <td class="actions">
              <a href="edit.php?id=<?php echo $d["id"]; ?>">Edit</a>
              <a href="hapus.php?id=<?php echo $d["id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
          <?php
        }
      ?>
    </table>
    <a href="tambah.php" class="button">Tambah Data</a>
    <br><br>
    <a href="logout.php" class="button" onclick="return confirm('Apakah Anda yakin ingin LOGOUT?')">LOGOUT</a>
  </div>
</body>
</html>
