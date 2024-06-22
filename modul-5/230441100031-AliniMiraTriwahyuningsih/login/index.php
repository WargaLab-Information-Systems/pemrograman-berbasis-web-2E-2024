<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
//pake location home juga gpp
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == "alini" && $password == "alini123") {
        $_SESSION['username'] = $username;
        header("Location: berhasil_login.php");
        exit;
    } else {
        $error = "Username atau password salah.";
    }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center><h1>Login</h1>
    <h3>pastikan username dan password anda benar</h3></center>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
    <center><form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
    </form></center>
</body>
</html>