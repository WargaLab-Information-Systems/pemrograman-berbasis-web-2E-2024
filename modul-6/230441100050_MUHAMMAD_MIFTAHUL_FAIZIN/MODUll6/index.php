<?php


if(isset($_GET['pesan'] )){
    if ($_GET['pesan'] == 'gagal'){
        echo"<div>gagal</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
    
    </style>
</head>
<body>
<div class="container">
<h1>Login</h1>
    <form action="ceklogin.php" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
        Belum punya akun? <a href="registrasi.php">Sign up disini</a>
    </form>
        </div>  
    
</body>
</html>