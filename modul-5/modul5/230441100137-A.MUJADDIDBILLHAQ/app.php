<?php
session_start();

// Memeriksa apakah sesi sudah ada
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'imamolar@gmail.com') {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <ul>
            <li><a href="/app.php">Home</a></li>
            <li><a href="isidatamhs.php">Data Mhs</a></li>
        </ul>

        <button><a href="logout.php">Logout</a></button>
    </nav>

    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.2.4/build/spline-viewer.js"></script>
    <spline-viewer url="https://prod.spline.design/3THar6JeUdWTQm75/scene.splinecode"></spline-viewer>

    <?php
        echo "<h2 class='welcome'>Selamat Datang</h2>" . "<br>" . "<h3 class='name'>" .$_SESSION['email'] . "</h3>";
    ?>

</body>
</html>