<?php
session_start();
// menghapus semua data yang terkait dengan sesi pengguna saat ini
session_destroy();  
header("Location:login.php");
?>