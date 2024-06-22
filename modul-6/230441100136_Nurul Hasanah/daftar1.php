<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR</title>
    <link rel="stylesheet" href="daftar1.css">
</head>
<body>
    <form action="" method="post">
    <h1>D A F T A R</h1>
    <table align="center">
        <tr>
            <td width="130"><b>Nama</b></td>
            <td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
        </tr>
        <tr>
            <td><b>Username</b></td>
            <td><input type="text" name="username" placeholder="nrl.hasanahh"></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><input type="email" name="email" placeholder="nurulhasanahh@gmail.com"></td>
        </tr>
        <tr>
            <td><b>Password</b></td>
            <td><input type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td><b>Konfirmasi Password</b></td>
            <td><input type="password" name="konfirmasiPassword" placeholder="Konfirmasi Password"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" value="Simpan" name="proses">Simpan</button></td>
        </tr>
    </table>
    </form>

    <a href="login.php">LOGIN</a>

</body>
</html>

<?php
include "koneksi.php";
if(isset($_POST['proses'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasiPassword = $_POST['konfirmasiPassword'];
    $duplicate = mysqli_query($koneksi, "SELECT * FROM daftar1 WHERE Username = '$username' OR Email = '$email'");
    
    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Username atau email sudah pernah digunakan!');</script>";
    }
    else{
        if($password == $konfirmasiPassword){
            $query = "INSERT INTO daftar1 (Nama, Username, Email, Password) VALUES ('$nama', '$username', '$email', '$password')";
            mysqli_query($koneksi, $query);
            echo "<script>alert('Daftar berhasil!!');</script>";
        }
        else{
            echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        }
    }
}
?>
