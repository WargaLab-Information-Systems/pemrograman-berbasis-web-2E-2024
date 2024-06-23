<?php
session_start();

$users = array(
    array('username' => 'NewUser1', 'password' => 'user111'),
    array('username' => 'Pengguna2', 'password' => 'user122'),
);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $_SESSION['username'] = $username;
            header('Location: page2.php');
            exit;
        }
    }

    $error = 'Invalid username or password';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: url(https://www.bhmpics.com/downloads/abstract-white-wallpaper/7.abstract-hexagon-wallpaper-white-background-3d-vector-illustration-vector-id1212342896.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        padding: 50px;
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    h1 {
        margin: 10vh;
        font-size: 3em;
        text-align: center;
    }
    .box {
        position: relative;
        width: 400px;
        height: 500px;
        background: rgba(184, 182, 182, 0.781);
        box-shadow: orange;
        border-radius: 10px;
        padding: 50px;
    }
    input {
        width: 100%;
    }
    </style>
</head>
<body>
    <div class="box">
        <form action="" method="post">
        <h1>Login</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" name="login" value="Login">
        </form>
        <?php if (isset($error)) { echo $error; }?>
    </div>
</body>
</html>
