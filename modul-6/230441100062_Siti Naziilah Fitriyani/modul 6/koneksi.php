<?php
    $koneksi = mysqli_connect("localhost", "root", "", "dbmahasiswa");

    if(mysqli_connect_error()){
        echo "koneksi gagal".mysqli_connect_error();
    }else {
    }
?>