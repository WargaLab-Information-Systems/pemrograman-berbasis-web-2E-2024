<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "t_praktikumm6pbw";
 
$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>
