<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hoome.css">
    <style>
        body{
            background: url('BG1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <ul>
            <li><a href="hoome.php"><b>Home</b></a></li>
            <li><a href="data_mahasiswa.php"><b>Data Mahasiswa</b></a></li>
        </ul>
        <button><a href="index.php">Logout</a></button>
    </nav>
    
    <div class="welcome-message" align="center">
        <h2>SELAMAT DATANG</h2>
        <h3>DI HALAMAN WEB DATA MAHASISWA!!</h3>
    </div>

    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.2.5/build/spline-viewer.js"></script>
   
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            echo "<h2 class='welcome'>Selamat Datang</h2>" . "<br>" . "<h3 class='name'>" . $username . "</h3>";
    
            function handleLogin($username, $password) {
                $data_client = [
                    "client_id" => 1,
                    "client_username" => "ningrum@gmail.com",
                    "client_password" => "rum123",
                ];
    
                if ($username == $data_client['client_username'] && $password == $data_client['client_password']) {
                    exit();
                } else {
                    header("Location: index.php");
                    echo "Login gagal, silakan coba lagi.";
                }
            }
            
            handleLogin($username, $password);
        }
    ?>

</body>
</html>
