<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM akademik WHERE id = '$id'");
header("Location:datamahasiswa.php");
?>
