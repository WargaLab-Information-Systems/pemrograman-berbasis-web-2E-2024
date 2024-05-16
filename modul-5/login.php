<?php
session_start();

$valid_logins = array(
    "dhea" => "3434", // contoh nama pengguna dan kata sandi
    "Diki" => "2323"
    // disini untuk me yimpan data si pengguna
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah nama pengguna dan kata sandi cocok dengan data yang valid
    if (isset($valid_logins[$username]) && $valid_logins[$username] == $password) {
        $_SESSION['login_user'] = $username;
        header("location: welcome.php");
        exit;
    } else {
        $error = "Username atau Password salah";
        echo $error;
    }
}
?>
