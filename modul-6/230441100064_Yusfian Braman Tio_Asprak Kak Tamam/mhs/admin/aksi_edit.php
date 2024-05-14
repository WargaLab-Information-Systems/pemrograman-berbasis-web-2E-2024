<?php 
  include 'koneksi.php';

  $id = $_POST['id'];
  $nama = $_POST["nama"];
  $nim = $_POST["nim"];
  $umur = $_POST["umur"];
  $kelamin = $_POST["kelamin"];
  $prodi = $_POST["prodi"];
  $jurusan = $_POST["jurusan"];
  $kota = $_POST["kota"];

  mysqli_query($koneksi,"UPDATE mahasiswa SET nama='$nama', nim='$nim', umur='$umur', kelamin='$kelamin', prodi='$prodi', jurusan='$jurusan', kota='$kota' where id='$id'");

  header("location:index.php");
 
?>