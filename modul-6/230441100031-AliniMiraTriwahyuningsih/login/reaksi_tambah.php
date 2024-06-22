<?php
include 'koneksi2.php';

$nama= $_POST['nama'];
$nim= $_POST['nim'];
$umur=$_POST['umur'];
$jenis_kelamin= $_POST['jenis_kelamin'];
$prodi= $_POST['prodi'];
$jurusan= $_POST['jurusan'];
$asal_kota= $_POST['asal_kota'];

mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama','$nim','$umur','$jenis_kelamin','$prodi','$jurusan','$asal_kota')");

header("location:datamahasiswa.php")
?>
<link rel="stylesheet" href="style.css">