<?php 
  include 'koneksi.php';
 
  // mengambil dari form
  $id = $_POST['id'];
  $nama = $_POST["nama"];
  $nim = $_POST["nim"];
  $umur = $_POST["umur"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $prodi = $_POST["prodi"];
  $jurusan = $_POST["jurusan"];
  $asal_kota = $_POST["asal_kota"];
 
  // insert to db
  mysqli_query($koneksi,"UPDATE inputmhs SET nama='$nama', nim='$nim', umur='$umur', jenis_kelamin='$jenis_kelamin', prodi='$prodi', jurusan='$jurusan', asal_kota='$asal_kota' where id='$id'");
 
  // kembali ke index
  header("location:index.php");
 
?>