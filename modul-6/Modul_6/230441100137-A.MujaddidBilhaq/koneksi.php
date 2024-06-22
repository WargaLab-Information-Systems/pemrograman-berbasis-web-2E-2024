<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "agus_login";
$port = 8111;
 
$conn = mysqli_connect($server, $user, $pass, $database, $port);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>