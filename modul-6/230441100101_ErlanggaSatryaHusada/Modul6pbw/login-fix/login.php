
<?php 

    session_start();
    include "db_login.php";
?>

<!DOCTYPE html>
<html lang="en">
<hewad>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url("retro.jpg");
            color: white;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            text-decoration: none;
        }

        a{
            text-decoration: none;
            color: red;
        }
    </style>
</hewad>
<body>
    
    <!-- <hr> -->

    <?php 
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");

            if(mysqli_num_rows($query) > 0 ) {
                $data = mysqli_fetch_array($query);
                $_SESSION['user'] = $data;
                echo '<script>alert("selamat datang, '.$data['nama'].'");
                    location.href="index.php";</script>' ;
            } else {
                echo '<script>alert("Username/Password tidak sesuai ")</script>';
            }
        }
    ?>

    <form  method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Login User</h3>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit">Login</button>
                        <a href="daftar.php">Daftar</a>
                    </td>
                </tr>
            </tr>
        </table>
    </form>
</body>
</html>