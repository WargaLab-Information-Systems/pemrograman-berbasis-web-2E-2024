<?php
include 'koneksi.php';

$NIM = $_POST['NIM'];
$NAMA = $_POST['NAMA'];
$UMUR = $_POST['UMUR'];
$ALAMAT = $_POST['ALAMAT'];
$ANGKATAN = $_POST['ANGKATAN'];
$JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
$ASAL_KOTA = $_POST['ASAL_KOTA'];
$PRODI = $_POST['PRODI'];
$JURUSAN = $_POST['JURUSAN'];


if (!$link) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

//query
$sql = "INSERT INTO mahasiswa (NIM, NAMA, UMUR, ALAMAT, ANGKATAN, JENIS_KELAMIN, ASAL_KOTA, PRODI, JURUSAN) 
        VALUES ('$NIM', '$NAMA', '$UMUR', '$ALAMAT', '$ANGKATAN', '$JENIS_KELAMIN', '$ASAL_KOTA', '$PRODI', '$JURUSAN')";

if (mysqli_query($link, $sql)) {
    header("Location: result.php?pesan=Data berhasil disimpan");
    exit();
} else {
    header("Location: result.php?pesan=" . urlencode("Error: " . $sql . "<br>" . mysqli_error($link)));
    exit();
}


mysqli_close($link);
?>
