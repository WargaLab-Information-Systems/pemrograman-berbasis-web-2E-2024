<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-container">
    <h2>Login User</h2>
    <form action="login.php" method="post">
        <div class="imgContainer"><img src="ya.jpg"></div>
        <div class="container">
            <label><b>Username :</b></label><br>
            <input type="text" placeholder="Masukkan Username" name="username" required/><br>
            <label><b>Password :</b></label><br>
            <input type="password" placeholder="Masukkan Password" name="password" required/><br>
            <input type="submit" name="login" value="Login"/>
        </div>
    </form>
</body>
</html>