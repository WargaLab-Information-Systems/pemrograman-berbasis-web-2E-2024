<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Universitas Trunojoyo Madura 👋🏻</h1>
    <center><h2>Tambah Data Mahasiswa</h2>
    <br>
    <form action="reaksi_tambah.php" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td>:<input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:<input type="number" name="nim"></td>
            </tr>
            <tr>
            <td>Umur</td>
            <td>:<input type="number" name="umur"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:<input type="text" name="jenis_kelamin"></td>
            </tr>
            <tr>
                <td>prodi</td>
                <td>:<input type="text" name="prodi"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:<input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Asal Kota</td>
                <td>:<input type="text" name="asal_kota"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value = "simpan"></td>
            </tr>
        </table>
    </form></center>
</body>
</html>