<?php
session_start();//mengulang login lagi
session_unset();
session_destroy();//menghapus 
header("Location: index.php");
exit;
?>
