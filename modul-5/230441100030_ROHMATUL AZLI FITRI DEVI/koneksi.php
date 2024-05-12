<?php
// Konfigurasi koneksi ke database MySQL
$host = "localhost";
$user = "root";
$password = "";
$database = "nama_database";

// Buat koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Check koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
