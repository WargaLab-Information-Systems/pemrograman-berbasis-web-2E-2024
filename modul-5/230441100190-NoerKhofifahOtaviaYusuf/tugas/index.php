<?php
session_start();
$error = "";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $pass = $_POST['pass'];

    if ($nama == 'novi' && $pass == '0310') {
        $_SESSION['nama'] = $nama;
        $_SESSION['pass'] = $pass;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah. Silakan coba lagi.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body background="ltrpres.jpg">
    <center>
        <div class="container">
            <p>Silahkan login terlebih dahulu!</p>
            <form action="index.php" method="POST">
                <p>Username:</p>
                <input type="text" name="nama">
                <p>Password:</p>
                <input type="password" name="pass"><br><br>
                <input type="submit" name="submit" value="Login">
            </form>
            <?php echo $error; ?>
        </div>
    </center>
</body>
</html>
