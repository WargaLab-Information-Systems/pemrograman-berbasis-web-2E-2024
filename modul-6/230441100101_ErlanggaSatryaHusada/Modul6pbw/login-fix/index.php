<?php 
    // inisialisasi session
    session_start();

    // mengecek apakah ada session user yang aktif , jika tidak arah kan ke login.php 
    if(!isset($_SESSION['user'])) {
        header('location:login.php'); //arah kan ke login.php
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align :center;
            background-image: url("retro.jpg");
            color: white;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            text-decoration: none;
            
        }

        a{
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <a href="crudFinal/index.php">data mahasiswa</a>
    <br><br>
    <h1>Halaman Administrator</h1>
    <a href="index.php">Home</a>
    <a href="logout.php">Logout</a>
    <hr>
    <h3>Selamat datang, <?php echo $_SESSION['user']['nama'];  ?></h3>
    halaman ini akan tampil setelah user login
</body>
</html>