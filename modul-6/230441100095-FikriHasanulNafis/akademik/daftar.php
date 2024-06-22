<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            margin-top: 0;
        }

        form {
            text-align: center;
        }

        form table {
            margin: 0 auto;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button.text {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
        button[type="text"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            /* margin-left: 10px; */
        }

        a:hover {
            color: #45a049;
        }
    
    </style>
</head>
<body>
    <?php
    if(isset($_POST['nama'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi, "INSERT INTO user(nama,username,password) values('$nama','$username','$password')");
        if ($query){
            echo '<script>alert("Selamat, pendaftaran anda berhasil. Silahkan Login")</script>';
        }else{
            echo '<script>alert("Pendaftaran anda gagal. Silahkan coba lagi")</script>';
        }
    }
    
    ?>
    <div class="container">
    <h3>Pendaftaran User</h3>
    <form method="post">
        <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <br>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <br>
        <tr>
            <td></td>
            <td>
            <button type="submit">Daftar User</button>
            <a href="login.php">Login</a>
            </td>
        </tr>
        </table>
    </form>
    </div>

</body>
</html>