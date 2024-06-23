<?php
session_start();
require 'functions.php';

// cek tombol register ditekan/tidak
if(isset($_POST["register"])){
    header("location: registrasi.php");
}


// cek tombol login ditekan/belum
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    // cek username (hitung berapa baris yang dikembalikan dari select diatas 1(ada)/0)
    if (mysqli_num_rows($result) === 1) {

        // cek passwordnya dan memasukkaannya ke $r(id,user,pass)
        $row = mysqli_fetch_assoc($result);

        // kebalikan p.has. ?ngecek string=hash
        if (password_verify($password, $row["password"]) ) {

            // set session 
            $_SESSION["login"] = true;

            header("location: index.php");
            exit;
        }
    }

    $error = true;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <h1>Halaman Login</h1>  
    
    <?php if (isset($error) ): ?>
        <p class="pesan">username / password salah atau belum terdaftar!</p>
    <?php endif;?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
                <button type="submit" name="register">Registrer</button>
            </li>
        </ul>

    </form>

</body>
</html>