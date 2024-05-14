<?php
  include "koneksi.php";

  $id = $_POST['id'];
  $nama = $_POST["nama"];
  $nim = $_POST["nim"];
  $umur = $_POST["umur"];
  $kelamin = $_POST["kelamin"];
  $prodi = $_POST["prodi"];
  $jurusan = $_POST["jurusan"];
  $kota = $_POST["kota"];

  mysqli_query($koneksi,
  "INSERT INTO mahasiswa (nama, nim, umur, kelamin, prodi, jurusan, kota) VALUES 
  ('$nama', '$nim', '$umur','$kelamin', '$prodi', '$jurusan', '$kota')");

  header ("location:index.php");
?>