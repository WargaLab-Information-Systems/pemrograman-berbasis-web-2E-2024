<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index1.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
    <div class="utama">
        <nav>
            <ul>
                <li><a href="crud/index1.php">Data Mahasiswa</a></li>
                <li><a href="logout.php" role= "button" onclick="return confirmlogout();">logout</a></li>
            </ul>
        </nav>
    </div>
    <div class="kedua">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>"; ?>
            <div class="input-group">
            </div>
        </form>
    </div>
    <script>
        function confirmlogout() {
        return confirm("Apakah Anda yakin ingin keluar data ini?");
    }
    </script>
</body>
</html>