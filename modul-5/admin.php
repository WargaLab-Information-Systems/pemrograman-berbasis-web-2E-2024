<?php
session_start();

if (!isset($_SESSION["berhasil"]) || $_SESSION["berhasil"] !== true) {
    header("location: login.php");
    exit;
}
// if (!isset($_SESSION['berhasil']) || !$_SESSION['berhasil']){
//     header("Location: login.php");
//     die();  
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <style>
        /* Add your custom styles here */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #000000;
            text-align: center;
            margin-top: 10px;
        }
        p {
            font-size: 16px;
            text-align: center;
            margin: 20px auto;
            max-width: 600px;
        }
        .navbar {
            background-color: #007bff;
            padding: 10px 0;
            text-align: center;
        }
        .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .navbar ul li {
            display: inline-block;
            margin-right: 20px;
        }
        .navbar ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <section class="navbar">
        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="data_mahasiswa.php">Data Mahasiswa</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </section>
    <h1>Selamat datang, Admin!</h1>
    <h1>Hallooowww!</h1>
    <p>Sekarang Anda berada di halaman utama website kami!</p>
</body>
</html>
