<?php
    $koneksi = mysqli_connect("localhost", "root", "", "data_mahasiswa");

    if(mysqli_connect_error()){
        echo "koneksi gagal".mysqli_connect_error();
    }else {
        echo "koneksi berhasil";
    }
?>