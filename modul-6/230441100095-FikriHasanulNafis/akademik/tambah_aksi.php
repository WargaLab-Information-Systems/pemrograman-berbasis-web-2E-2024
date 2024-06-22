<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];
$jeniskelamin = $_POST['jeniskelamin'];
$prodi = $_POST['prodi'];
$jurusan = $_POST['jurusan'];
$asalkota = $_POST['asalkota'];

mysqli_query($koneksi, "INSERT INTO akademik VALUES('','$nama','$nim','$umur','$jeniskelamin','$prodi','$jurusan','$asalkota')");

header("location:datamahasiswa.php");


?>