<?php

    $koneksi = mysqli_connect ("localhost", "root", "", "mahasiswa");

    if (mysqli_connect_error()){
        echo "koneksi gagal". mysqli_connect_error();
    }else{
        echo "<h3>koneksi berhasil<br> Selamat Datang Admin</h3>";
    }
?>