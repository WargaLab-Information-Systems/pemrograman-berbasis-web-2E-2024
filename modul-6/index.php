<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="lgn.css">
</head>
<body>
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "<div class='pesan-gagal'>Login gagal! Username dan password salah!</div>";
        } else if($_GET['pesan'] == "logout") {
            echo "<div class='pesan-logout'>Anda telah berhasil logout</div>";
        } else if($_GET['pesan'] == "belum_login"){
            echo "<div class='pesan'>Anda harus login untuk mengakses data mahasiswa</div>";
        }
    }
    ?>

   <div class="container">
        <h2>Silahkan login terlebih dahulu!</h2>
        <form action="cek_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" name="submit" value="Login">
        </form>
        <p>Belum punya akun? <a href="signup.php">Daftar di sini</a></p>
    </div>
</body>
</html>
