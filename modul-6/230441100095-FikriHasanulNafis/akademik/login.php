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
    font-family: Tahoma, Arial, Helvetica, sans-serif;
    background-color: aqua;
    display: flex; 
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
    margin: 0; 
    }

.container {
    width: 300px;
    background-color:#fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 1, 0.1);
    border:1px solid;
    
}

h1 {
    text-align: center;
    margin-top: 0; 
}

td {
    padding: 8px;
}


input[type="text"],
input[type="password"],
input[type="submit"] {
    width:100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;

}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}
.daftar{
    text-decoration: none;
    color: black;
}

    
    </style>
</head>
<body>
<div class="container">
<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' and password = '$password'");

    if(mysqli_num_rows($query) >0){
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
    echo '<script>alert("Selamat datang, '.$data['nama'].'");location.href="home.php"</script>';

    }else{
        echo '<script>alert("Username atau password salah");location.href="login.php"</script>';
    }
}

?>
    <form class="form-container"method="post">
        <table>
        <tr>
            <td colspan="2" align="center">
            <h3>Login</h3>
            </td>
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
            <button type="submit">Login</button>
            <a class="daftar"href="daftar.php">Daftar</a>
             </td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>