<!-- welcome.php -->
<?php
session_start();

// Cek apakah pengguna sudah login
if(!isset($_SESSION['login_user'])){
    header("location: index.php");
    exit(); // Menghentikan eksekusi script jika tidak ada session login
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
            background-image: url('gr2.jpg');
        }
        .container {
            width: 80%;
            margin: 100px auto;
            text-align: center;
        }
        h2 {
            font-size: 36px;
            color: #333333;
        }
        .welcome-message {
            font-size: 24px;
            color: #666666;
            margin-top: 20px;
        }
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
        }
        /* CSS tambahan */
        h2, .welcome-message {
            font-size: 30px;
            color: #007bff;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logout-link:hover {
            color: #0056b3;
        }
        .logout-link, .home-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #007bff; /* Warna teks biru */
            text-decoration: none; /* Hilangkan underline */
        }
        .logout-link:hover, .home-link:hover {
            color: #0056b3; /* Warna teks biru gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo $username; ?>!</h2>
        <p class="welcome-message">Terima kasih telah login, Anda sekarang berada di halaman welcome yang hanya bisa di akses setelah Anda berhasil login.</p>
        <p><a href="home.php" class="home-link">Halaman Home</a></p>
    </div>
</body>
</html>
