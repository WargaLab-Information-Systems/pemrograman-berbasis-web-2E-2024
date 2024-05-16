<?php
session_start();

if(!isset($_SESSION['login_user'])){
    header("location: index.php");
    die();
}

$username = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang, <?php echo $username; ?>!</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #007bff; /* Ubah warna background menjadi biru */
        }


        .container {
        width: 80%;
        max-width: 800px;
        margin: 100px auto;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
        background-color: #ffff00; /* Ubah warna background menjadi kuning */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }


        h2 {
            font-size: 36px;
            color: #333333;
            margin-bottom: 20px;
        }

        .welcome-message {
            font-size: 24px;
            color: #666666;
            margin-top: 20px;
        }

        .logout-link {
            display: inline-block;
            margin-top: 20px;
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
            border-bottom: 1px solid #007bff;
            padding-bottom: 5px;
        }

        .logout-link:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo $username; ?>!</h2>
        <p class="welcome-message">Terima kasih telah login. Anda sekarang dapat melihat halaman yang hanya bisa diakses setelah login.</p>
        <p><a href="home.php">Halaman Home</a></p>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>
</body>
</html>
