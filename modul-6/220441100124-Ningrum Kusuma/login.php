<?php
session_start();

$users = [
    ['username' => 'rum', 'password' => 'rum123', 'nama' => 'User']
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $user['nama'];
            header('Location: index.php');
            exit;
        }
    }

    $error = 'Username atau password salah';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <style>
        body{
            background: url('BG.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body style="margin-top: 110px;">
    <div class="login container" style="align-content: center;">
        <center>
            <h2>Login</h2>
            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
            <form method="post" action="">
                <label>Username:</label><br>
                <input type="text" name="username" required><br><br>
                <label>Password:</label><br>
                <input type="password" name="password" required><br><br>
                <input type="submit" value="Login">
            </form>
        </center>
    </div>

</body>
</html>
