<?php
session_start();
include 'koneksi.php';

$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];

$check = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$new_username' AND password='$password'");
if(mysqli_num_rows($check) > 0) {
    header("location:login.php?pesan=UsernameAtauPassword_tersedia");
    exit(); 
}

$add = mysqli_query($koneksi, "INSERT INTO admin (username, password) VALUES ('$new_username', '$new_password')");

if($add) {
	header("location:index.php?pesan=register_berhasil");
} else {
    header("location:index.php?pesan=register_gagal");
}
?>