<?php
    include 'koneksi.php';

    // mengambil dari form\
    $Nim = $_POST['Nim'];
    $Nama = $_POST['Nama'];
    $Umur = $_POST['Umur'];
    $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $Prodi = $_POST['Prodi'];
    $Jurusan = $_POST['Jurusan'];
    $Asal_Kota = $_POST['Asal_Kota'];

    // insert to db
    mysqli_query($koneksi, "INSERT INTO datamahasiswa (Nim, Nama, Umur, Jenis_Kelamin, Prodi, Jurusan, Asal_Kota) VALUES ('$Nim', '$Nama','$Umur','$Jenis_Kelamin','$Prodi','$Jurusan','$Asal_Kota')");

    // kembali ke index
    header("location:index.php");
?>