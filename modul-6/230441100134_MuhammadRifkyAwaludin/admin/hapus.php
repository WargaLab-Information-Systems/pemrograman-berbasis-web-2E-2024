<?php 
include 'koneksi.php';

$id = $_GET['id'];
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM inputmhs WHERE id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>