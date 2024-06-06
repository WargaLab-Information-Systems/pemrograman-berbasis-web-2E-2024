<?php 
include 'koneksi.php';

$id = $_GET['id'];
 
// menghapus data dari db
mysqli_query($koneksi,"DELETE FROM inputmhs WHERE id='$id'");
 
header("location:index.php");
 
?>