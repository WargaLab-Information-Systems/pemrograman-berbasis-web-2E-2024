<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleee.css">
  <title>Document</title>
</head>
<body>
    <div class="utama">
        <nav>
            <ul>
                <li><a href="halamanUtama.php">Home</a></li>
                <li><a href="crud/index.php">Data Mahasiswa</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
    </div>
    <div class="kedua">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
            <div class="input-group">
            <!-- <a href="logout.php" class="btn">Masuk</a> -->
            </div>
        </form>
    </div>
</body>
</html>