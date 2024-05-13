<?php

require 'functions.php';

// jika tombol register di tekan
if (isset($_POST["register"])) {

        // jika nilai lebih 0 artinya ada user baru yang berhasil daftar ke db
        if(registrasi($_POST) > 0 ){
            echo"<script>
                    alert('user baru berhasil ditambahkan! ');
                    document.location.href = 'login.php'
                </script>";

        }else{
            echo mysqli_error($conn);
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="registrasi.css">

</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">

        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>

    </form>

</body>
</html>