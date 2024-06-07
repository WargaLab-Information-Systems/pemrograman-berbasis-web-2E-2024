<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css"> 
</head>
<body>

<?php
session_start();

// Menentukan array yang berisi username dan password yang valid
$users = array(
    "sahaf" => "12345",
);
// Memeriksa apakah tombol login ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
// Memeriksa apakah username dan password yang dimasukkan oleh pengguna cocok dengan yang ada dalam array $users
    if (array_key_exists($username, $users) && $users[$username] == $password) {
        // Jika cocok, sesi username diinisialisasi dan pengguna diarahkan ke halaman beranda
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
         // Jika tidak cocok, variabel $error diatur untuk menampilkan pesan kesalahan
        $error = "Username atau Password yang dimasukkan salah.";
    }
}
?>

    <div class="login-container">
        <form method="POST" action="">
            <h2>Login Page</h2>
            <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>