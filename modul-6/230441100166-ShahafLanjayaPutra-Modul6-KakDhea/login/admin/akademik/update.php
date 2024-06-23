<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];
$jeniskelamin = $_POST['jeniskelamin'];
$prodi = $_POST['prodi'];
$jurusan = $_POST['jurusan'];
$asalkota = $_POST['asalkota'];
 
 
// update data ke database
mysqli_query($koneksi, "UPDATE mahasiswa SET 
    nama='$nama', 
    nim='$nim', 
    umur='$umur', 
    jeniskelamin='$jeniskelamin', 
    prodi='$prodi', 
    jurusan='$jurusan', 
    asalkota='$asalkota' 
    WHERE id='$id'"
);

 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>