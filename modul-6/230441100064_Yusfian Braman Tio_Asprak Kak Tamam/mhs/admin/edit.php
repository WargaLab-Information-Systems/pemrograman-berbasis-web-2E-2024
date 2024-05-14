<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Mahasiswa</title>
<link rel="stylesheet" href="create.css">
</head>
<body>
  <div class="container">
    <h1>EDIT DATA MAHASISWA</h1>
    <?php
      include 'koneksi.php';
      $id = $_GET['id'];
      $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
      while ($d = mysqli_fetch_array($data)) {
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
          <td>Jenis Kelamin</td>
          <td>
            <select name="kelamin">
              <option value="Laki-Laki" <?php if($d['kelamin'] == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
              <option value="Perempuan" <?php if($d['kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
          </td>
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
          <td><input type="text" name="kota" value="<?php echo $d['kota']; ?>"></td>
        </tr>
      </table>
      <div class="actions">
        <input type="submit" value="SIMPAN">
        <a href="index.php" class="button">Kembali</a>
      </div>
    </form>
    <?php 
      }
    ?>
  </div>
</body>
</html>
