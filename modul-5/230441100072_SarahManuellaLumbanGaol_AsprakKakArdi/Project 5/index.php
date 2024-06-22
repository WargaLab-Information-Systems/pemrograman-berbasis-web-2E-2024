<?php
error_reporting(0);
session_start();
if (isset($_POST['Login'])){
    $user= $_POST['Username'];
    $pass=$_POST['Password'];

    if($user=='Sarahmnuella' AND $pass=='123456'){
        $_SESSION['Login Berhasil'] = true;
        $_SESSION['user'] = $user; 
        header('Location: Display.php');
        exit;
    }elseif($user=='Sarahh' && $pass=='123'){
            $_SESSION['Login Berhasil'] = true;
            $_SESSION['user'] = $user; 
            header('Location: Display.php');
            exit;
    } else {
        $salah = "<p style='color:red;text-align: center;'>Username dan Password yang Anda masukkan salah.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2304.4110.0072</title>
</head>
   <link rel="stylesheet" href="style.css">
<body>
    <div class="container">
        <div class="formlogin">
            <div class="foto">
                <img src="login.jpg">
                <h1>Login</h1>
            </div>
    <?php echo $salah?>
        <form action="" method="post">
            <input type="text" placeholder="Usename" name="Username"><br>
            <input type="password" placeholder="Password" name="Password"><br>
            <button type="submit" name="Login">Login</button>
        </form>
<div class="lupa">
    <a href="#"><span>forgot the password</span></a>
    <a href="#"><span>don't have an account yet?</span></a>
</div>
        </div>
    </div>
</body>
</html>