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
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome To My Website, <?php echo $username; ?></h1> <!-- Menampilkan nama pengguna di sini -->
        </div>
    </header>
    <main>
        <div class="container1">
            <section class="about">
                <h2>About Me</h2>
                <p>Selamat datang di website sederhana saya. Sebelum kita lanjut, mari kita mulai dengan doa sesuai keyakinan masing-masing. Doa dimulai... Doa selesai. Sekarang, mari kita lanjutkan.</p>
            </section>
            <div class="center">
                <a href="mahasiswa.php" class="btn-next">Next</a>
            </div>
        </div>
    </main>
</body>
</html>
