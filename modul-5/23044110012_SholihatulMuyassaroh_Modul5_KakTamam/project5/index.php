<?php
session_start();

// Set nama pengguna dan kata sandi yang valid
$valid_username = "lili";
$valid_password = "11111";


// Periksa apakah pengguna telah melakukan submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Periksa apakah nama pengguna dan kata sandi valid
    if ($username === $valid_username && $password === $valid_password) {
        // Simpan nama pengguna dalam session
        $_SESSION["username"] = $username;

        // untuk ke halaman lain setelah login berhasil
        header("Location: home.php");
        exit;
    } else {
        // Jika nama pengguna atau kata sandi tidak valid
        $error = "Nama pengguna atau kata sandi salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Halaman Login</h2>
        <?php if (!empty($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <input type="text" name="username" placeholder="Nama Pengguna" required><br>
        <input type="password" name="password" placeholder="Kata Sandi" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
