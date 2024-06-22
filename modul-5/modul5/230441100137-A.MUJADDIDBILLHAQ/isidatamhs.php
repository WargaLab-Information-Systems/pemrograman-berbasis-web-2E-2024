<?php
session_start();

// Memeriksa apakah sesi sudah ada
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'imamolar@gmail.com') {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <nav class="navbar">
        <ul>
            <li><a href="app.php">Home</a></li>
            <li><a href="isidatamhs.php">Data Mhs</a></li>
        </ul>

        <button><a href="logout.php">Logout</a></button>
    </nav>

    <div class="main">
        <div class="field-input">
            <input type="text" name="tambah" id="tambah" placeholder="Tambah Data Mahasiswa" class="nama" required>
            <button class="tombol-tambah">Tambah</button>
        </div>

        <div class="data">
            <table id="table" border="1">
                <tr>
                    <th width="300">Nama</th>
                    <th width="300">Nim</th>
                    <th width="300">Angkatan</th>
                </tr>
            </table>
        </div>
    </div>

    <script src="script.js"></script>

</body>
</html>