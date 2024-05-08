
<?php

session_start();



if (isset($_POST["username"]) && isset($_POST["password"] )) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "inikhanif" && $password=="inikhanif"){
        
        $_SESSION['login'] = True ;
        $_SESSION["username"] = $username;
  
        header("Location: landingpage.php");
        exit;
    }}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>anjassmabarprofesional</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- page 1 -->
    <section class="login_page">
      <div class="main_login">
        <div class="form_box">
          <form action="index.php" method="post">
            <?php $alert = ""; ?>
            <label for="">username</label>
            <input type="text" id="username" name="username"/>
            <label for="">password</label>
            <input type="password" id="password" name="password"/>
            <button id="submit1" type="submit">submit</button>
          </form>
        </div>
        <div class="head">LOGIN</div>
      </div>
    </section>
    <!-- end page 1 -->

   
  </body>
</html>