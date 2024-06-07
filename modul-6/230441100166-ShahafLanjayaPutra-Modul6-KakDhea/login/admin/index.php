<!DOCTYPE html>
<html>
<head>
    <title>ADMIN</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Memilih jenis font */
        background-image: url('img.jpg'); /* Menetapkan gambar latar belakang */
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px; /* Lebar maksimum kontainer */
        margin: 50px auto; /* Mengatur jarak dari atas dan bawah serta mengatur posisi menjadi tengah */
        background-color: #ffffff; /* Warna latar belakang kontainer */
        padding: 40px; /* Padding di dalam kontainer */
        border-radius: 10px; /* Membuat sudut kontainer menjadi bulat */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Efek bayangan pada kontainer */
    }
    h2 {
        text-align: center; /* Posisi teks menjadi tengah */
        color: #007bff; /* Warna teks */
        margin-bottom: 30px; /* Jarak dari bawah */
    }
    h4 {
        color: #495057; /* Warna teks */
        text-align: center; /* Posisi teks menjadi tengah */
        margin-bottom: 30px; /* Jarak dari bawah */
    }
    a {
        display: inline-block; /* Mengubah link menjadi elemen blok */
        text-decoration: none; /* Menghapus dekorasi link */
        color: #ffffff; /* Warna teks link */
        background-color: #007bff; /* Warna latar belakang link */
        padding: 12px 30px; /* Padding di dalam link */
        border-radius: 5px; /* Membuat sudut link menjadi bulat */
        text-align: center; /* Posisi teks link menjadi tengah */
        margin-top: 20px; /* Jarak dari atas */
        transition: background-color 0.3s ease; /* Efek transisi ketika link dihover */
        font-weight: bold; /* Ketebalan teks link */
    }
    a:hover {
        background-color: #0056b3; /* Warna latar belakang link saat dihover */
    }
</style>

</head>
<body>
    <div class="container">
        <h2>Halaman Admin</h2>
        
        <!-- cek apakah sudah login -->
        <?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
        ?>
        
        <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! Anda telah login.</h4>
        
        <a href="akademik\index.php">DATA MAHASISWA</a>
        <br>
        <a href="logout.php">LOGOUT</a>
    </div>
</body>
</html>
