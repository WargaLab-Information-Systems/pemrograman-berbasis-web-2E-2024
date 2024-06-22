<?php
session_start();

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}else {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="home">
    <h2>Selamat Datang, 
        <br><?php echo $username; ?> !!!</h2>
    <p><a href="data.php">Lihat Data Mahasiswa</a></p>
    </div>
</body>
</html>