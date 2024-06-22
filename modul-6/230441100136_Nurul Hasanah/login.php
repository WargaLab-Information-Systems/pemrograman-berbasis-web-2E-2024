<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="" method="post">
    <h1>L O G I N</h1>
    <table align="center">
        <tr>
            <td><b>Username / Email</b></td>
            <td><input type="text" name="usernameEmail" id="usernameEmail" placeholder="Username or Email"></td>
        </tr>
        <tr>
            <td><b>Password</b></td>
            <td><input type="password" name="password" id="password" placeholder="Password"></td>
        <tr>
            <td></td>
            <td><button type="submit" value="Simpan" name="proses">Login</button></td>
        </tr>
    </table>
    </form>
    <a href="daftar1.php">DAFTAR</a>
</body>
</html>

<?php
include "koneksi.php";
session_start();

if(isset($_POST["proses"])){
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];
    $duplicate = mysqli_query($koneksi, "SELECT * FROM daftar1 WHERE Username = '$usernameEmail' OR Email = '$usernameEmail'");
    $row = mysqli_fetch_assoc($duplicate);

    if(mysqli_num_rows($duplicate) > 0){
        if($password == $row["Password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: form.php");
            exit();
        }
        else{
            echo "<script>alert('Password Anda Salah!!');</script>";
        }
    } 
    else{
        echo "<script>alert('Anda Belum Daftar!!');</script>";
    }
}
?>
