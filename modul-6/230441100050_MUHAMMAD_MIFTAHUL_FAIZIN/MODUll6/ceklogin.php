<?php
session_start();

include 'koneksis.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi , "SELECT * FROM ecommerce WHERE username='$username' and password='$password'");

$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    $_SESSION['username'] = $username;
    header("location: home.php");
} else {
    // Jika login gagal, Anda bisa menangani pesan kesalahan di sini
    echo "Login gagal. Silakan coba lagi.";
}
?>
