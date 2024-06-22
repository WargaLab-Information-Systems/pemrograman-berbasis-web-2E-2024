<?php 
//koneksi dbase
include 'koneksi.php';

//menangkap data yang dikirim dari form
$id=$_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];
$jenis_klmin = $_POST['jenis_klmin'];
$prodi = $_POST['prodi'];
$jurusan = $_POST['jurusan'];
$asal_kota = $_POST['asal_kota'];

//update data ke dbasae
mysqli_query($koneksi,"UPDATE input_data SET nama='$nama', nim='$nim', umur='$umur', jenis_klmin='$jenis_klmin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' where id='$id'");


// kembali
header("location:index.php");
?>
