<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Personal Website</title>
    <link rel="stylesheet" href="gaya.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="aku.jpeg" class="profile-img">
            <h1>Welcome to My Website</h1>
        </div>
    </header>
    <main>
        <div class="container1">
            <section class="about">
                <h2>About Me</h2>
                <p>Halo! Saya Dio Ramadhani pratama purwono, seorang yang bersemangat untuk menjadi seorang polisi yang berpendidikan di bidang komputer.
Saya memiliki latar belakang pendidikan sarjana di bidang komputer, 
dengan pengetahuan dalam pemrograman, keamanan jaringan, dan analisis data.
Cita-cita saya adalah menjadi seorang polisi yang dapat memanfaatkan pengetahuan teknologi 
untuk meningkatkan efisiensi operasional kepolisian.</p>
            </section>
        </div>
        <div>
        <a href="mahasiswa.php" class="btn-next">Next</a>
        </div>
    </main>
</body>
</html>

