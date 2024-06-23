<?php 
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_mahasiswa";

$connect = mysqli_connect($host, $user, $pass, $db);
$sql1 = "select * from accont";
$q1 = mysqli_query($connect, $sql1);

$error = "";
$success = "";
$found = False;


if(isset($_POST['submit'])){
    if (isset($_POST["username"]) && isset($_POST["password"] )) {
    
        while($r1 = mysqli_fetch_array($q1)){
            $username1 = $r1['username'];
            $password1 = $r1['password'];
        
    
            $username = $_POST["username"];
            $password = $_POST["password"];
    
    
            if ($username == $username1 && $password==$password1){
                
                $_SESSION['login'] = True ;
                $_SESSION["username"] = $username;
                $found = True;
                header("Location: index.php");
                exit;
            }
    
        }
        if(!$found){
            $error = 'Akun Tidak Ditemukan boss';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="height: 100%; width:100%;">
    <section class="d-flex align-items-center" style="height:100vh; width:100%; background-color:blue;">

        <div class="card mx-auto " style="width: 18rem;">
            <?php if ($error){
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "$error"?>
            </div> <?php
        } ?>
            <h5 class="card-title mx-auto">LOGIN</h5>

            <div class="card-body">

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="password">
                    </div>
                    <div class="mb-3">
                        <a href="register.php">sign-up?</a>
                    </div>
                    <div class="mb-3">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>