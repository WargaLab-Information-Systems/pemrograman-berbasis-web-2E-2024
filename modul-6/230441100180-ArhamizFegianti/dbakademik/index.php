<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login Page</title>
</head>

<body>
  <h2 align="center">Login Page User</h2> <br>
  <?php
    if (isset($_GET['pesan'])){
      if ($_GET['pesan'] == "logout"){
        echo "Anda telah berhasil logout";
      }else if ($_GET['pesan'] = "gagal"){
        echo "Username atau Password salah!";
      }
    }
  ?>

  <form method="post" action="aksi_login.php">
    <table>
      <tr>
        <td>Username : </td>
        <td><input type="text" name="username" placeholder="Masukkan Username Anda"></td>
      </tr>

      <tr>
        <td>Password : </td>
        <td><input type="password" name="password" placeholder="Masukkan Password Anda"></td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="LOGIN"></td>
      </tr>

    </table>
  </form>

  <br> 
  <h3 align="center"><a href="daftar.php" class="button">Belum punya akun? Daftar di sini</a></h3>


</body>
</html>

</body>
</html>