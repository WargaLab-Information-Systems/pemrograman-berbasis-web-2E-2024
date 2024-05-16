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
    <title>Form Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="tambah.css">
    <script>
        function validateForm() {
            var nama = document.forms["myForm"]["Nama"].value;
            var nim = document.forms["myForm"]["NIM"].value;
            var umur = document.forms["myForm"]["Umur"].value;
            var prodi = document.forms["myForm"]["Prodi"].value;
            var jurusan = document.forms["myForm"]["Jurusan"].value;
            var asal_kota = document.forms["myForm"]["Asal_kota"].value;

            if (nama == "" || nim == "" || umur == "" || prodi == "" || jurusan == "" || asal_kota == "") {
                alert("Semua kolom harus diisi!");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Form Tambah Data Mahasiswa</h2>
        <form name="myForm" method="POST" action="" onsubmit="return validateForm()">
            <div class="input-container">
                <label>Nama:</label>
                <input type="text" name="Nama">
            </div>
            
            <div class="input-container">
                <label>NIM:</label>
                <input type="text" name="NIM">
            </div>
            
            <div class="input-container">
                <label>Umur:</label>
                <input type="text" name="Umur">
            </div>
            
            <div class="input-container">
                <label>Jenis Kelamin:</label>
                <input type="radio" name="Jenis_Kelamin" value="Laki-laki" id="laki-laki"> <label for="laki-laki">Laki-laki</label>
                <input type="radio" name="Jenis_Kelamin" value="Perempuan" id="perempuan"> <label for="perempuan">Perempuan</label>
            </div>
            
            <div class="input-container">
                <label>Prodi:</label>
                <input type="text" name="Prodi">
            </div>
            
            <div class="input-container">
                <label>Jurusan:</label>
                <input type="text" name="Jurusan">
            </div>
            
            <div class="input-container">
                <label>Asal Kota:</label>
                <input type="text" name="Asal_kota">
            </div>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>