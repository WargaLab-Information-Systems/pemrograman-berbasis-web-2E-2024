<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="log.css">
</head>
<body>
  <div class="container">
    <h2>Login Page User</h2>
    <?php
      if (isset($_GET['pesan'])){
        echo '<div class="message">';
        if ($_GET['pesan'] == "logout"){
          echo "Anda telah berhasil logout";
        }else if ($_GET['pesan'] == "gagal"){
          echo "Username atau Password salah!";
        }
        echo '</div>';
      }
    ?>

    <form method="post" action="aksi_login.php">
      <table>
        <tr>
          <td>Username:</td>
          <td><input type="text" name="username" placeholder="Masukkan Username Anda"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password" placeholder="Masukkan Password Anda"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="LOGIN"></td>
        </tr>
      </table>
    </form>

    <a href="daftar.php" class="register-link">Belum punya akun? Daftar di sini</a>
  </div>
</body>
</html>
