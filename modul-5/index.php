<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- <script>
    function redirectToHome() {
      window.location = "home.php";
    }
  </script> -->
  <link rel="stylesheet" href="login.css">
</head>

<body>  
<?php
session_start();
$user_data = array();

// Set to empty values
$name = $password = "";
$nameErr = $passwordErr = "";

// Pengecekan jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validasi input nama pengguna
  if (empty($_POST["name"])) {
    $nameErr = "Nama diperlukan";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  // Validasi input password
  if (empty($_POST["password"])) {
    $passwordErr = "Password diperlukan";
  } else {
    $password = test_input($_POST["password"]);
  }
  
  // Jika tidak ada kesalahan validasi, lanjutkan proses login
  if(empty($nameErr) && empty($passwordErr)) {
    // Menyimpan data input pengguna ke dalam array
    $user_data['name'] = $name;
    $user_data['password'] = $password;

    // Menyimpan nama pengguna ke dalam sesi
    $_SESSION['username'] = $name;

    // Redirect ke halaman beranda setelah login berhasil
    header("Location: home.php");
    // redirect('home.php');
    exit();
  }
}

// Fungsi untuk membersihkan dan memvalidasi input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!-- Form login -->
<h2>Login Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <!-- Pesan kesalahan untuk input nama pengguna -->
  <span class="error"><?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="password" name="password">
  <!-- Pesan kesalahan untuk input password -->
  <span class="error"><?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
