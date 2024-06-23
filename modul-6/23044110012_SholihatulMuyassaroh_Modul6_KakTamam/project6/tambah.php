<?php
session_start();

if ( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan/belum
if (isset($_POST["submit"])) {
    
    // cek data berhasil ditambah/tidak
    if (tambah($_POST) > 0 ){
        echo"
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php'
            </script>
        ";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="tambah.css">
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nim">Nim</label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="umur">Umur</label>
                <input type="text" name="umur" id="umur" required>
            </li>
            <li>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="radio" name="jenis_kelamin" value="laki-laki" id="jenis_kelamin_l" required>
                <label for="jenis_kelamin_l">Laki-laki</label>
                <input type="radio" name="jenis_kelamin" value="perempuan" id="jenis_kelamin_p" required>
                <label for="jenis_kelamin_p">perempuan</label>
            </li>
            <li>
                <label for="prodi">Prodi</label>
                <input type="text" name="prodi" id="prodi" required>
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="asal_kota">Asal Kota</label>
                <input type="text" name="asal_kota" id="asal_kota" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>

    </form>    

</body>
</html>