<?php
session_start();

if ( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mahasiswa = query('SELECT * FROM mahasiswa');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman mahasiswa</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <br>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Asal Kota</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($mahasiswa as $row ) :?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>" class="ubah">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin untuk mengapus data ini?');" class="hapus">hapus</a>
            </td>
            <td><?= $row ["nama"] ?></td>
            <td><?= $row ["nim"] ?></td>
            <td><?= $row ["umur"] ?></td>
            <td><?= $row ["jenis_kelamin"] ?></td>
            <td><?= $row ["prodi"] ?></td>
            <td><?= $row ["jurusan"] ?></td>
            <td><?= $row ["asal_kota"] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <a href="tambah.php" class="tambah">Tambah Data Mahasiswa</a>
    <a href="logout.php" class="tambah"> Logout</a>
    
</body>
</html>