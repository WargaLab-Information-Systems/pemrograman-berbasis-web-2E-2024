<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
    exit(); 
}
$nama_user = $_SESSION['user']['nama'];

if(isset($_POST['logout'])){
    session_unset(); 
    session_destroy(); 
    header('location:login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Administrator</title>
    <style>
        .navbar {
        display: flex;
        background-color: #333;
        justify-content: center;
        }

        .navbar a {
        padding: 20px 15px;
        text-decoration: none;
        color: red;
        font-size: 18px;
        }

        .navbar a:hover {
        background-color: #f4f4f4;
        }

    </style>
</head>
<body>
<nav>
    <div class="navbar">
            <a href="home.php">Home</a>
            <a href="datamahasiswa.php">Data Mahasiswa</a>
            <a href="logout.php">Logout</a>
     </div>
    </nav>
    <h1>Halaman Administrator</h1>
    <hr>
    <h3>Selamat datang, <?php echo $nama_user; ?> </h3> 
</body>
</html>
