<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "INSERT INTO admin (username, password) VALUES ('$username', '$password')");

    if ($query) {
        header("location: index.php?pesan=daftar_sukses");
    } else {
        header("location: daftar.php?pesan=gagal");
    }
}
?>

