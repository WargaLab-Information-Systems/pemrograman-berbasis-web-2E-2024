<?php 
include 'koneksi.php';
$id = $_POST['id'];
$NIM = $_POST['NIM'];
$NAMA = $_POST['NAMA'];
$UMUR = $_POST['umur'];
$ALAMAT = $_POST['ALAMAT'];
$ANGKATAN = $_POST['ANGKATAN'];
$JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
$ASAL_KOTA = $_POST['ASAL_KOTA'];
$PRODI = $_POST['prodi'];
$JURUSAN = $_POST['jurusan'];

// Memeriksa koneksi
if (!$link) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menjalankan query update
$sql = "UPDATE mahasiswa SET NIM='$NIM', NAMA='$NAMA',UMUR ='$UMUR' , ALAMAT='$ALAMAT', ANGKATAN='$ANGKATAN', JENIS_KELAMIN='$JENIS_KELAMIN', ASAL_KOTA='$ASAL_KOTA', PRODI='$PRODI', JURUSAN='$JURUSAN' WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    echo "Data berhasil diupdate";
    header("location:mahasiswa.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

// Menutup koneksi
mysqli_close($link);
?>
