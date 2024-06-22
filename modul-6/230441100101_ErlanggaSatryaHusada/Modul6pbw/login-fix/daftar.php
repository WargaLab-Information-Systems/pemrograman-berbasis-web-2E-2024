<?php

session_start();
include "db_login.php";
?>

<!DOCTYPE html>
<html lang="en">
<hewad>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url("retro.jpg");
            color: white;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            text-decoration: none;
        }

        a{
            color: white;
        }
    </style>
</hewad>

<body>


    <?php
    if (isset($_POST['username'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = mysqli_query($koneksi, "INSERT INTO user(nama,username,password) values ('$nama','$username','$password')");

        if ($query) {
            echo '<script>alert("Selamat, pendaftaran anda berhasil. Silahkan Login")</script>';
        } else {
            echo '<script>alert("Pendaftaran Gagal")</script>';
        }
    }

    ?>


    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Pendaftaran User</h3>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Daftar User</button>
                    <a href="login.php">Login</a>
                </td>
            </tr>
            </tr>
        </table>
    </form>
</body>

</html>