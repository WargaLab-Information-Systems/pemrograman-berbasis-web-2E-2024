 <?php
    session_start();
    include "koneksi.php";
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">
 </head>
 <body>

    <?php
    // mmrksa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // mencari user dengan username dan password yang dimasukkan
        $data = mysqli_query($koneksi, "SELECT*FROM users WHERE username='$username' AND password='$password'");

        // ap dt dtmkn
        if ($data->num_rows >0) {
            $_SESSION["username"] = $username;
            header("Location: Data.php");
            exit();
        } else {
            echo '<script>alert ("Username/password tidak sesuai. ") ; </script>';
        }
    }
        
        $koneksi->close()
    ?>

    <form method="post">
        <table>
            <tr>
                <td colspan="3" align="center">
                    <h2>Login</h2>
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
                <td></td>
                <td>
                    <button type="submit">Login</button>
                </td>
            </tr>
        </table>
    </form>
 </body>
 </html>