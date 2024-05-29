<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'pengelompokan';


$conn = mysqli_connect($hostname, $username, $password, $database);


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

require 'koneksis.php';

if(isset($_POST['tambah'])){

    if(tambah($_POST) > 0){
        echo "
        <script>
        alert('Data berhasil didaftarkan');
        window.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal didaftarkan');
        window.location.href = 'registrasi.php';
        </script>
        "; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>REGISTER</h1>
        <form action="" method="post">
            <label for="username">Username :</label>
            <input type="text" placeholder="Isi username" class="username" name="username" required>
            <label for="password">Password :</label>
            <input type="password" placeholder="Isi password" class="password" name="password" required>
            <label for="email">Email :</label>
            <input type="email" placeholder="Isi Email" name="email" required>
            <button type="submit" class="tambah" name="tambah">Submit</button>
        </form> 
    </div>
</body>
</html>
