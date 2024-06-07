<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body background="ltrpres.jpg">
    <section id="Home" class="home">
        <div class="container">
            <div class="prof">
                <img class="rounded-circle mts" src="nv.jpg" alt=""/>
                <h3>Selamat datang di web <?php echo $_SESSION['nama']; ?></h3>
                <p>Terima kasih sudah mengunjungi website ini. Silakan lakukan pencarian di website ini.</p>
            </div>
        </div>
    </section>
    <center>
    <button>
            <a align="center" href="halaman2.php">next</a>
            <div align="decrease"></div>
    </button>
    </center>
</body>
</html>
