<?php
session_start(); // Mulai session
session_unset(); // Hapus semua variabel session
session_destroy(); // Hapus session
header("Location: login1.php"); // Redirect ke halaman login
exit;
?>
