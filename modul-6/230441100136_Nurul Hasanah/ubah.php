<?php

include "koneksi.php";
$sql = mysqli_query($koneksi, "select * from form where NIM='$_GET[kode]'");
$data = mysqli_fetch_array($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBAH DATA</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="" method="post">
    <h1>Form Data Mahasiswa</h1>
    <div class="image-container">
    <img src="foto.jpg" alt="Gambar"></div>
    <table align="center" height="450px">
        <tr>
            <td width="130"><b>Nama</b></td>
            <td><input type="text" size="35" name="nama" placeholder="Nama Lengkap" 
            value="<?php echo $data['Nama']; ?>"> </td>
        </tr>
        <tr>
            <td><b>NIM</b></td>
            <td><input type="number" size="35" name="nim" placeholder="23-136"
            value="<?php echo $data['NIM']; ?>"> </td>
        </tr>
        <tr>
            <td><b>Umur</b></td>
            <td><input type="number" size="35" name="umur" placeholder="Umur"
            value="<?php echo $data['Umur']; ?>"> </td>
        </tr>
        <tr>
            <td><b>Jenis Kelamin</b></td>
            <td><input type="radio" name="jeniskelamin" value="Laki-Laki"> Laki-Laki
                <input type="radio" name="jeniskelamin" value="Perempuan"> Perempuan
            </td>
        </tr>
        <tr>
            <td><b>Prodi</b></td>
            <td><input type="text" size="35" name="prodi" placeholder="Prodi"
            value="<?php echo $data['Prodi']; ?>"> </td>
        </tr>
        <tr>
            <td><b>Jurusan</b></td>
            <td><input type="text" size="35" name="jurusan" placeholder="Jurusan" 
            value="<?php echo $data['Jurusan']; ?>"> </td>
        </tr>
        <tr>
            <td><b>Asal Kota</b></td>
            <td><input type="text" size="35" name="asal" placeholder="Asal Kota"
            value="<?php echo $data['Asal_Kota']; ?>"> </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" value="Simpan" name="proses">Simpan</button>
                <button type="reset" value="Reset">Reset</button>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "update form set
    Nama = '$_POST[nama]',
    NIM = '$_POST[nim]', 
    Umur = '$_POST[umur]',
    Jenis_Kelamin = '$_POST[jeniskelamin]',
    Prodi = '$_POST[prodi]',
    Jurusan = '$_POST[jurusan]',
    Asal_Kota = '$_POST[asal]'
    where NIM = '$_GET[kode]'");

    header("Location: tabel.php");
    exit(); 
}
?>