<?php 
session_start();
require 'function.php';

if(isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"])){
            //set session
            $_SESSION["login"] = true;    
                   
            header("Location: index.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script>
        function validateForm() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            if (username === "" || password === "") {
                alert("Username dan Password harus diisi!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>LOGIN</h1>

    <?php if(isset($error)): ?>
        <p style="color: red;">username/password salah</p>
    <?php endif; ?>

    <form action="" method="post" onsubmit="return validateForm()">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <button type="submit" name="login">Login</button>
        </ul>
        <p>belum punya akun?<a href="registrasi.php">Click Here</a></p>
       <button><a href="homepage.php">HomePage</a></button> 
    </form>
</body>
</html>
