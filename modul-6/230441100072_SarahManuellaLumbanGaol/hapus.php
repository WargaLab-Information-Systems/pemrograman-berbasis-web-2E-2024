<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'function.php';
?>
<a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from input_data where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>