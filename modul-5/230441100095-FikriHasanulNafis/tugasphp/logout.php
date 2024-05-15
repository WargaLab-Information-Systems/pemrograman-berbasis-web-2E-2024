<?php
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Alihkan ke halaman login
header("location: login.php");
exit;
?>
