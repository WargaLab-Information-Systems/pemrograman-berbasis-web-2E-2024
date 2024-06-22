<?php
// Mulai session
session_start();

// untuk
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Periksa apakah session 'user' telah diset
if(isset($_SESSION['username'])) {
    // Ambil nilai user dari session
    $user = $_SESSION['username'];
} else {
    // Jika session 'user' tidak ada
    $user = "Tamu";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <?php echo $user; ?></h1>
        <p>Ini adalah halaman home dari website. Website ini dibuat untuk memenuhi tugas praktikum pemrograman berbasis web modul5.</p>
        <a href="mahasiswa.php" class="button">data mahasiswa</a>
    </div>
</body>
</html>
