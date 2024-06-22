<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halamanUtama</title>
    <style>
        *{
            font-family: 'poppins', sans-serif;
            background-color: #c9d6ff;
            background:linear-gradient(to right,#e2e2e2,#c9ffe3);
        }
        .navbar {
            padding: 10px 0;
            text-align: center;
        }
        .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .navbar ul li {
            display: inline-block;
            margin-right: 20px;
        }
        .navbar ul li a {
            color: #black;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <section class="navbar">
        <ul>
            <li><a href="inputMahasiswa.php">Home</a></li>
            <li><a href="inputMahasiswa/inputMahasiswa.php">Data Mahasiswa</a></li>
            <li><a href="logout.php">Logout</a></li>
            <!-- mereka adlah item dri navigasi -->
        </ul>
    </section>
    <div style="text-align:center; padding:15%;">
      <p  style="font-size:50px; font-weight:bold;">
       Hello  <?php 
       if(isset($_SESSION['email'])){
        // Ini adalah kondisi PHP yang memeriksa apakah sesi pengguna telah diset
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        // digunakan untuk mengambil data pengguna berdasarkan alamat email yang disimpan
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
            // loop while yang digunakan untuk mengambil setiap baris data 
        }
       }
       ?>
       :)
      </p>
    </div>
</body>
</html>