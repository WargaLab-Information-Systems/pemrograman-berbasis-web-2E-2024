<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABEL FORM</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>
    <h1 align="center">Tabel Data Mahasiswa</h1>

    <table border='1' align="center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
            <th colspan="2">Pilihan</th>
        </tr>
<?php

include "koneksi.php";
$no=1;
$ambildata = mysqli_query($koneksi, "select * from form");
while ($tampil = mysqli_fetch_array($ambildata)){
    echo "
    <tr>
        <td>$no</td>
        <td>$tampil[Nama]</td>
        <td>$tampil[NIM]</td>
        <td>$tampil[Umur]</td>
        <td>$tampil[Jenis_Kelamin]</td>
        <td>$tampil[Prodi]</td>
        <td>$tampil[Jurusan]</td>
        <td>$tampil[Asal_Kota]</td>
        <td><a href='?kode=$tampil[NIM]'> Hapus </a></td>
        <td><a href='ubah.php?kode=$tampil[NIM]'> Ubah </a></td>
    </tr>";   
    $no++;
}
?>
    </table>

<?php
if(isset($_GET['kode'])){
    mysqli_query($koneksi, "delete from form where NIM='$_GET[kode]'");
 
}
?>
<br><br>
<a href="form.php"><h4 align="center">TAMBAH DATA</h4></a>
</body>
</html>

