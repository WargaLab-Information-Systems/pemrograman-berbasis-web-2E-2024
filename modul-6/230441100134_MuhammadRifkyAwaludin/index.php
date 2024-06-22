<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login Page</title>
</head>

<body>
  <h2 align="center">LOGIN PAGE USER</h2>
  <?php
    if (isset($_GET['pesan'])){
      if ($_GET['pesan'] == "logout"){
        echo "Anda telah berhasil logout";
      }else if ($_GET['pesan'] = "gagal"){
        echo "Username atau Password salah!";
      }
    }
  ?>

  <div class="login-form">
    <form method="post" action="aksi_login.php">
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username Anda">
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="text" id="password" name="password" placeholder="Masukkan Password Anda">
      </div>

      <div class="input-group">
        <button type="submit" class="login-button">LOGIN</button>
      </div>
    </form>
  </div>

  <h3 align="center"><a href="daftar.php" class="button">Belum punya akun? Daftar di sini</a></h3>
</body>
</html>
