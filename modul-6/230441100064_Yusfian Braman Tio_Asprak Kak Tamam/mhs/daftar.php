<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" href="log.css">
</head>
<body>
  <div class="container">
    <h2>DAFTAR</h2>
    <form method="post" action="aksi_daftar.php">
      <table>
        <tr>
          <td>Username:</td>
          <td><input type="text" name="new_username" placeholder="Masukkan Username Baru"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="new_password" placeholder="Masukkan Password Baru"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="DAFTAR"></td>
        </tr>
      </table>
    </form>
    <a href="index.php" class="login-link">Kembali ke Login Page</a>
  </div>
</body>
</html>
