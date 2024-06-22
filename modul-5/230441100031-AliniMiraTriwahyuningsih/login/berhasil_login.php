<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Selamat Datang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center><h2>Selamat Datang Di Web Data Mahasiswa Fakultas Teknik,<?php echo $username; ?></h2></center>
    <center><p>Klik untuk halaman selanjutnya</p></center>
    <center><a href="datamahasiswa.php">masuk</a></center>
</body>
</html>
