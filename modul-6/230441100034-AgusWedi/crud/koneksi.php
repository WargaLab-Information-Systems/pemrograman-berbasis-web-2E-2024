<?php

$host="localhost";
$user="root";
$pass="";
$db="phpdasar";
$port = 8111;
$conn = new mysqli($host,$user,$pass,$db,$port);
if(!$conn){
    echo "koneksi gagal:".$conn->connect_error;
}
?>