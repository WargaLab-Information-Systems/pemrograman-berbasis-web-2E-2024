<?php

//untuk memasukkan satu file PHP ke dalam file PHP lainnya
require_once("koneksi.php");

if(isset($_POST['daftar'])){


    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


    // menyiapkan query
    $data = "INSERT INTO admin (username, password) VALUES ($username, $password)";
    $stmt = $db->prepare($data);

    // bind parameter ke query
    $params = array(
        // ":name" => $name,
        ":username" => $username,
        ":password" => $password,
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>

        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>


            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
        </form>
            
        </div>
    </div>
</div>

</body>
</html>