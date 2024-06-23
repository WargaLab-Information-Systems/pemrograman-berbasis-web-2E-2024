<?php
    include 'koneksi.php';

    $Nama = $_POST['Nama'];
    $Nim = $_POST['Nim'];
    $Umur = $_POST['Umur'];
    $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $Prodi = $_POST['Prodi'];
    $Jurusan = $_POST['Jurusan'];
    $Asal_Kota = $_POST['Asal_Kota'];

    mysqli_query($koneksi, "UPDATE datamahasiswa SET `Nama`='$Nama',`Nim`='$Nim',`Umur`='$Umur',`Jenis_Kelamin`='$Jenis_Kelamin',`Prodi`='$Prodi',`Jurusan`='$Jurusan',`Asal_Kota`='$Asal_Kota'");

    header("location:Data.php");
?>