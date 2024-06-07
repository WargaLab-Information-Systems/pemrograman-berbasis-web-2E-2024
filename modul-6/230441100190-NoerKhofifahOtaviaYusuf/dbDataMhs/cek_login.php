<?php
session_start();

include 'konek.php';
$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($konek, "SELECT * FROM admin where username='$username' and password='$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location:Data.php");
}else{
    header("location:index.php?pesan=gagal");
}

?>

