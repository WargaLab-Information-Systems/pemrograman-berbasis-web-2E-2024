<?php
session_start();

// Data pengguna yang valid
$valid_email = "imamolar@gmail.com";
$valid_password = "imamgg";

// Mendapatkan nilai dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Memeriksa apakah email dan password sesuai
if ($email === $valid_email && $password === $valid_password) {
    // Membuat sesi
    $_SESSION['email'] = $email;
    header("Location: app.php"); // Redirect ke halaman app.php
} else {
    // Jika tidak sesuai, kembali ke halaman login
    header("Location: index.php");
}
?>
