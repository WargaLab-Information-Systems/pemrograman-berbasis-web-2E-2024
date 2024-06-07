<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="ind.css">
</head>
<body>
    <center>
        <div class="container">
            <h2>Silahkan Daftar disini</h2>
            <form action="proses-daftar.php" method="POST">
                <p>Username:</p>
                <input type="text" name="username">
                <p>Password:</p>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="daftar">
            </form>
            <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
        </div>
    </center>
</body>
</html>

