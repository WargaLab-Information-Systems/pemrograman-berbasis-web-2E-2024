<?php
    include "koneksi.php";

    // mengambil dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $jenis_klmin = $_POST['jenis_klmin'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $asal_kota = $_POST['asal_kota'];

    // insert to db
    mysqli_query($koneksi, "INSERT INTO input_data(nama,nim,umur,jenis_klmin,prodi,jurusan,asal_kota) VALUES ('$nama','$nim','$umur','$jenis_klmin','$prodi'
    ,'$jurusan','$asal_kota')");

    // kembali
    header("location:index.php");
?>