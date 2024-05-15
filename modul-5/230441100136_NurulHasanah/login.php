<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'admin' && $password == '1234'){
        $_SESSION['username'] = $username;
        $_SESSION['level1'] = 'admin';
        header('Location: home.php');
    } elseif($username == 'ana' && $password == '1234'){
        $_SESSION['username'] = $username;
        $_SESSION['level1'] = 'admin';
        header('Location: home.php');
    } else {
        echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
    }
}
?>