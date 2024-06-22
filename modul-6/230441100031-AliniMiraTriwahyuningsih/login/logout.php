<?php 
 
session_start();
session_destroy();
 
header("Location: login.php");
 
?>
<link rel="stylesheet" href="style.css">