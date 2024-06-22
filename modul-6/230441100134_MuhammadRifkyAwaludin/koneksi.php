<?php
$koneksi = mysqli_connect("localhost", "root", "", "akademik");

if(mysqli_connect_error()){
  echo "Koneksi Gagal" . mysqli_connect_error();
}

// try {    
//   //create PDO connection 
//   $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
// } catch(PDOException $e) {
//   //show error
//   die("Terjadi masalah: " . $e->getMessage());
// }
?>