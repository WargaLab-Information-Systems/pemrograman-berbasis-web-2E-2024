<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
<h1>
<?php
session_start();

// Periksa apakah pengguna telah login
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
} else {
    // Jika pengguna belum login, arahkan kembali ke halaman login
    header("Location: login.php");
    exit();
}
?>
</h1>
</header>

<nav>
    <a href="home.php">Beranda</a>
    <a href="tabel.php">Tabel</a>
    <a href="index.php">Log Out</a>
</nav>

<div class="container">

    <section>
        <h2>CP</h2>
        <p>Email: yb.com</p>
        <p>Telepon: 085708178888</p>
    </section>

</div>

</body>
</html>