<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    .content {
        padding: 20px;
    }


    </style>
</head>
<body>
    <nav>
        <div class="navbar">
            <a href="home.php">Home</a>
            <a href="mahasiswa.php">Data Mahasiswa</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="content">
        <h2>Selamat datang, <?php echo $_SESSION["username"]; ?>!</h2>
    </div>
</body>
</html>