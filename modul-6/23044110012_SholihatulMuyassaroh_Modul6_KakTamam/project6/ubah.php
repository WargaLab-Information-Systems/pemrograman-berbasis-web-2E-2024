<?php
session_start();

if ( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id (query ambil dari function)
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan/belum
if (isset($_POST["submit"])) {
    
    // cek data berhasil diubah/tidak
    if (ubah ($_POST) > 0 ){
        echo"
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data tidak berhasil diubah!');
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
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="ubah.css">
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs ["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
            </li>
            <li>
                <label for="nim">Nim</label>
                <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"] ?>">
            </li>
            <li>
                <label for="umur">Umur</label>
                <input type="text" name="umur" id="umur" required value="<?= $mhs["umur"] ?>">
            </li>
            <li>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin_l" required value="laki-laki" <?= $mhs["jenis_kelamin"] == 'laki-laki' ? 'checked' : '' ?>>
                <label for="jenis_kelamin_l">Laki-laki</label>
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin_p" required value="perempuan" <?= $mhs["jenis_kelamin"] == 'perempuan' ? 'checked' : '' ?>>
                <label for="jenis_kelamin_p">Perempuan</label>
            </li>
            <li>
                <label for="prodi">Prodi</label>
                <input type="text" name="prodi" id="prodi" required value="<?= $mhs["prodi"] ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"] ?>">
            </li>
            <li>
                <label for="asal_kota">Asal Kota</label>
                <input type="text" name="asal_kota" id="asal kota" required value="<?= $mhs["asal_kota"] ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    </form>    

</body>
</html>
