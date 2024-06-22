<?php
session_start();
include "connect.php";
if (!isset($_SESSION['email'])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <style>
    * {
        font-family: 'poppins', sans-serif;
    }

    body {
        background: linear-gradient(to right, #e2e2e2, #ffad33);
    }

    .navbar {
        display: flex;
        justify-content: center;
        background-color: #e2e2e2;
        border-radius: 10px;
    }

    .navbar ul {
        list-style: none;
        padding: 0;
    }

    .navbar ul li {
        display: inline-block;
        margin-right: 20px;
    }

    .navbar ul li a {
        text-decoration: none;
        font-weight: 600;
    }
    </style>
</head>

<body>
    <section class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="inputMahasiswa/tampilanMahasiswa.php">Data Mahasiswa</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </section>
    <div style="text-align:center; padding:15%;">
        <p style="font-size:50px; font-weight:bold;">
            Hello <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
            :)
        </p>
    </div>
</body>

</html>