<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>Document</title>
</head>

<body>
<h2 align="center">Register Page User</h2> <br>
  <form method="post" action="aksi_daftar.php">
      <table>
        <tr>
          <td>Username : </td>
          <td><input type="text" name="new_username" placeholder="Masukkan Username Baru"></td>
        </tr>
  
        <tr>
          <td>Password : </td>
          <td><input type="password" name="new_password" placeholder="Masukkan Password Baru"></td>
        </tr>

        <tr>
          <td></td>
          <td></td>
          <td><input type="submit" value="DAFTAR"></td>
        </tr>
      </table>
    </form>
    <br> 
    <h3 align="center"><a href="index.php" class="button">Kembali ke Login Page</a></h3>
</body>
</html>