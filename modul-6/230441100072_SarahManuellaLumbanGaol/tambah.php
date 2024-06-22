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
    <h2>Data Mahasiswa</h2>
    <br>
    <form action="aksi_tambah.php" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name = "nama"></td>
            </tr>
            <tr>
                <td>Nim</td>
                <td><input type="text" name ="nim"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name ="umur"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jenis_klmin"></td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type="text" name="prodi"></td>
            </tr>
            <tr>
                <td>jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td><input type="text" name="asal_kota"></td>
            </tr>
            <tr>
                <td><input type="submit" value="simpan"></td>
            </tr>

        </table>
    </form>
</body>
</html>