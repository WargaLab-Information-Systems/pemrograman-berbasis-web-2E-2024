<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'pengelompokan');

if (!$koneksi) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

function tambah($data) {
    global $koneksi;
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];

    
    $checkTableQuery = "SHOW TABLES LIKE 'ecommerce'";
    $result = mysqli_query($koneksi, $checkTableQuery);
    if (mysqli_num_rows($result) == 0) {
        die('Tabel user tidak ada.');
    }

    $query = "INSERT INTO ecommerce (username, password, email) VALUES ('$username', '$password', '$email')";
    return mysqli_query($koneksi, $query);
}
?>
