<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

<header>
<h1>

<?php
session_start();

// Periksa apakah pengguna telah login
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Wellcome, $username!";
} else {
    // Jika pengguna belum login, arahkan kembali ke halaman login
    header("Location: index.php");
    exit();
}
?>

</h1>
</header>

<nav>
    <a href="home.php">Beranda</a>
    <a href="tabel.php">Tabel</a>
    <a href="index.php">Log out</a>
</nav>

<div class="container">

    <section>
        <h2>About Us</h2>
        <p>Sahaf Lanjaya Putra Mujiono</p>
    </section>

    <section>
        <h2>Service</h2>
        <p>Full Stack Developer</p>
    </section>

    <section>
        <h2>Contact</h2>
        <p>Email: shahaf@gmail.com</p>
        <p>Telepon: 0895367365675</p>
    </section>

</div>

</body>
</html>