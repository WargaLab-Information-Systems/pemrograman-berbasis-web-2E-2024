<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];
$jeniskelamin = $_POST['jeniskelamin']; 
$prodi = $_POST['prodi'];
$jurusan = $_POST['jurusan'];
$asalkota = $_POST['asalkota'];

mysqli_query($koneksi,"update akademik set nama='$nama', nim='$nim', umur='$umur', jeniskelamin='$jeniskelamin',
prodi='$prodi',jurusan='$jurusan',asalkota='$asalkota' where id='$id'");
 
// mengalihkan halaman kembali ke datamahasiswa.php
header("location:datamahasiswa.php");
 
?>