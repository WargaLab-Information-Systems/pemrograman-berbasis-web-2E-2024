<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['Nama'];
    $nim = $_POST['NIM'];
    $umur = $_POST['Umur'];
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $prodi = $_POST['Prodi'];
    $jurusan = $_POST['Jurusan'];
    $asal_kota = $_POST['Asal_kota'];

    mysqli_query($koneksi, "INSERT INTO mhs (Nama, NIM, Umur, Jenis_kelamin, Prodi, Jurusan, Asal_kota) VALUES('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");

    header("location:Data.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="tmb.css">

</head>
<body align="center">
    <h2>Form Tambah Data Mahasiswa</h2>
    <form method="POST" action="">
        <label>Nama:</label><br>
        <input type="text" name="Nama"><br>
        
        <label>NIM:</label><br>
        <input type="text" name="NIM"><br>
        
        <label>Umur:</label><br>
        <input type="text" name="Umur"><br>
        
        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="Jenis_Kelamin" value="Laki-laki"> Laki-laki
        <input type="radio" name="Jenis_Kelamin" value="Perempuan"> Perempuan<br>
        
        <label>Prodi:</label><br>
        <input type="text" name="Prodi"><br>
        
        <label>Jurusan:</label><br>
        <input type="text" name="Jurusan"><br>
        
        <label>Asal Kota:</label><br>
        <input type="text" name="Asal_kota"><br><br>
        
        <input type="submit" value="Tambahkan">
    </form>
    <br/>
    <button><a href="Data.php">KEMBALI</a></button>
</body>
</html>

