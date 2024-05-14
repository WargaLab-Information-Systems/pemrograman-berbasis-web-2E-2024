<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
<link rel="stylesheet" href="create.css">
</head>
<body>
  <div class="container">
    <h1>Tambah Data</h1>
    <form action="aksi_tambah.php" method="post">
      <table>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" placeholder="Masukkan Nama"></td>
        </tr>
        <tr>
          <td>NIM</td>
          <td><input type="number" name="nim" placeholder="Masukkan NIM"></td>
        </tr>
        <tr>
          <td>Umur</td>
          <td><input type="number" name="umur" placeholder="Masukkan Umur"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
            <select name="kelamin" id="kelamin">
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Program Studi</td>
          <td><input type="text" name="prodi" placeholder="Masukkan Program Studi"></td>
        </tr>
        <tr>
          <td>Jurusan</td>
          <td><input type="text" name="jurusan" placeholder="Masukkan Jurusan"></td>
        </tr>
        <tr>
          <td>Asal Kota</td>
          <td><input type="text" name="kota" placeholder="Masukkan Asal Kota"></td>
        </tr>
      </table>
      <div class="actions">
        <input type="submit" value="Simpan">
        <a href="index.php" class="button">Kembali</a>
      </div>
    </form>
  </div>
</body>
</html>
