<?php
// Mulai sesi
session_start();

// Validasi login
$valid_logins = array(
    "dhea" => "3434", // Contoh nama pengguna dan kata sandi
    "Diki" => "2323"
    // Disini untuk menyimpan data pengguna
);

// Periksa jika metode permintaan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah nama pengguna dan kata sandi cocok dengan data yang valid
    if (isset($valid_logins[$username]) && $valid_logins[$username] == $password) {
        // Set session login_user
        $_SESSION['login_user'] = $username;
        // Arahkan ke halaman selamat datang setelah login berhasil
        header("location: welcome.php");
        exit;
    } else {
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #333333;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            padding: 10px;
            margin: 5px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Silakan Login</h2>
        <!-- Form login dengan method POST -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
        <!-- Tampilkan pesan error jika login gagal -->
        <?php
        if (isset($error)) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
        ?>
    </div>
</body>
</html>
