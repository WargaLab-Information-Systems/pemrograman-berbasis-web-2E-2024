<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            justify-content: center;
            align-items: center;
            background: url(https://e1.pxfuel.com/desktop-wallpaper/366/30/desktop-wallpaper-light-blue-circles-loopable-abstract-backgrounds-light-blue-background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            padding: 50px;
        }
        div {
            display: flex;
            justify-content: center;
            margin: 50px;
            padding: 50px;
        }
        h1 {
            font-size: 4em;
        }
        h2 {
            font-size: 2em;
            justify-content: center;
            text-align: center;
        }
        p {
            font-size: larger;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <form>
            <h1>WELCOME IN THIS PAGE</h1>
            <h2>Selamat datang di halaman ini, <?php echo $username;?>!</h2>
            <p><a href="page3.php">Klik untuk ke halaman selanjutnya!</a><p>
        </form>
    </div>
</body>
</html>
