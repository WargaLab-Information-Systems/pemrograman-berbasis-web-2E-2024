<?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "login gagal! usename dan password salah!";
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="ind.css">
</head>
<body>
   <center>
        <div class="container">
            <p>Silahkan login terlebih dahulu!</p>
            <form action="cek_login.php" method="POST">
                <p>Username:</p>
                <input type="text" name="username">
                <p>Password:</p>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="Login">
                <center>
                <button>
                    <a align="center" href="daftar.php">Daftar</a>
                    <div align="decrease"></div>
                </button>
                </center>
            </form>

        </div>
    </center>
</body>
</html>

