<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="" method="post">
    <h1>Form Data Mahasiswa</h1>
    <div class="image-container">
    <img src="foto.jpg" alt="Gambar"></div>
    <table align="center" height="450px">
        <tr>
            <td width="130"><b>Nama</b></td>
            <td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
        </tr>
        <tr>
            <td><b>NIM</b></td>
            <td><input type="number" name="nim" placeholder="23136"></td>
        </tr>
        <tr>
            <td><b>Umur</b></td>
            <td><input type="number" name="umur" placeholder="Umur"></td>
        </tr>
        <tr>
            <td><b>Jenis Kelamin</b></td>
            <td><input type="radio" name="jeniskelamin" value="Laki-Laki"> LAKI-LAKI
                <input type="radio" name="jeniskelamin" value="Perempuan"> PEREMPUAN
            </td>
        </tr>
        <tr>
            <td><b>Prodi</b></td>
            <td><input type="text" name="prodi" placeholder="Prodi"></td>
        </tr>
        <tr>
            <td><b>Jurusan</b></td>
            <td><input type="text" name="jurusan" placeholder="Jurusan"></td>
        </tr>
        <tr>
            <td><b>Asal Kota</b></td>
            <td><input type="text" name="asal" placeholder="Asal Kota"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" value="Simpan" name="proses">Simpan</button>
                <button type="reset" value="Reset">Reset</button>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "insert into form set
    Nama = '$_POST[nama]',
    NIM = '$_POST[nim]',
    Umur = '$_POST[umur]',
    Jenis_Kelamin = '$_POST[jeniskelamin]',
    Prodi = '$_POST[prodi]',
    Jurusan = '$_POST[jurusan]',
    Asal_Kota = '$_POST[asal]'");

    header("Location: tabel.php");
    exit();
}
?>