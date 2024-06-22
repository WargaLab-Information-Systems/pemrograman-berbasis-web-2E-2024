<?php
session_start(); // Memulai sesi

// Cek apakah user sudah login, jika sudah redirect ke halaman home
if(isset($_SESSION['username'])) {
    header("Location: home.php");
    exit;
}

// Cek apakah form login sudah di-submit
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah username dan password sesuai
    $username = "angga"; // Ganti dengan username yang valid
    $password = "angga123"; // Ganti dengan password yang valid

    if($_POST['username'] == $username && $_POST['password'] == $password) {
        // Jika sesuai, simpan username dalam session dan redirect ke halaman home
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        // Jika tidak sesuai, tampilkan pesan error
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div><br>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div><br>
        <button type="submit">Login</button>
    </form>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
</body>
</html>
