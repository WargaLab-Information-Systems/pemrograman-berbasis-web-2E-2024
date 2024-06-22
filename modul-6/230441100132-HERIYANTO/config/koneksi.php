<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "pbwmodul6";

$koneksi = mysqli_connect($hostname, $username, $password, $database_name);

if ($koneksi->connect_error) {
    echo "koneksi database rusak";
    die("error!");
}
