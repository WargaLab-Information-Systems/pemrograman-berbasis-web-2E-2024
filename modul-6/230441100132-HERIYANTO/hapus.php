<?php 
include 'config/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from data_mahasiswa where id='$id'");
header("location:dashboard.php");
?>
