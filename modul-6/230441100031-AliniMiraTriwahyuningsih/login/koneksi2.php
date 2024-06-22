<?php
$koneksi = mysqli_connect("localhost","root","","data_mahasiswa");
if (mysqli_connect_error()){
    echo"Koneksi gagal" .mysqli_connet_error();
}else{
    echo"koneksi berhasil";
}
?>
<link rel="stylesheet" href="style.css">