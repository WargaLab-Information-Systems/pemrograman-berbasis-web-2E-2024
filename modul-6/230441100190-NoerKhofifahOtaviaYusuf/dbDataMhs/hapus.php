<?php 
include 'koneksi.php';
 
$id = $_GET['id'];
mysqli_query($koneksi,"delete from mhs where id='$id'");
 
header("location:Data.php");
 
?>

