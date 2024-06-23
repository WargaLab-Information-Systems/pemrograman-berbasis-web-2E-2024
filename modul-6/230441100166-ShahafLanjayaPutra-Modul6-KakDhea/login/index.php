<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <!-- cek pesan notifikasi -->
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='notification'>Login gagal! Username dan password salah!</div>";
            } else if($_GET['pesan'] == "logout"){
                echo "<div class='notification'>Anda telah berhasil logout</div>";
            } else if($_GET['pesan'] == "belum_login"){
                echo "<div class='notification'>Anda harus login untuk mengakses halaman admin</div>";
            }
        }
        ?>

        <form method="post" action="cek_login.php">
            <input type="text" name="username" placeholder="Masukkan username">
            <input type="password" name="password" placeholder="Masukkan password">
            <input type="submit" value="LOGIN">
        </form>
        <br> 
        <h3 align="center"><a href="daftar.php" class="button">Belum punya akun? Daftar di sini</a></h3>
    </div>
</body>
</html>
