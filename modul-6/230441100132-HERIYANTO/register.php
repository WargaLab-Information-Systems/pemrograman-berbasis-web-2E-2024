<?php
    include "config/koneksi.php";
    session_start();

    $register_message = "";

    if(isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash("sha256", $password);

        try {
            $sql = "INSERT INTO users (username, password) VALUES 
        ('$username', '$hash_password')";

        if($koneksi->query($sql)) {
            $register_message = "daftar akun berhasil silahkan login";
        }else {
            $register_message = "gagal silahkan coba lagi";
        }
        }catch (mysqli_sql_exception) {
            $register_message = "username sudah di gunakan, silahkan ganti yang lain";
        }
        $koneksi->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="register.css" rel="stylesheet">
</head>
<body>
    <h1>HALLO SILAHKAN DAFTAR</h1>

    <?php include "layout/header.html" ?>

    <h3>Daftar akun</h3>
    <i><?= $register_message ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="register">daftar sekarang</button>
    </form>

    <?php include "layout/footer.html" ?>
</body>
</html>