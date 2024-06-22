<?php

    $host="localhost";
    $user="root";  
    // Variabel ini menyimpan nama pengguna untuk mengakses database MySQL 
    $password="";
    $db="crud";
    // menyimpan nama database yang ingin dihubungkan
    $kon = new mysqli($host,$user,$password,$db);      I
    // ni adalah sintaks untuk membuat objek koneksi
    if($kon->connect_error){
        echo "Failed to connect DB".$kon->connect_error;
        // ini gunanya untuk memeriksa apakah ada kesalahan
    }
?>