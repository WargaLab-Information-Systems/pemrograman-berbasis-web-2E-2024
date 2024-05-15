<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: home.php");
    exit;
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correct_password = "password"; 

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($password === $correct_password) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username; // Simpan nama pengguna yang dimasukkan pengguna
        header("Location: home.php");
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family:Tahome, arial, helvetica, sans-serif;
            background-color: #7FFFD4;
        }
        h2{
            text-align:center;
            margin-top: 0; 
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 20px rgba(0, 0, 1, 0.1);
            height: 100vh; 
        }

        .form-container {
            text-align: center;
            border: 1px solid;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px; 
        }

        label {
            display: block;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
            color: yellow;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <?php if ($error != ''): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>

</body>
</html>
