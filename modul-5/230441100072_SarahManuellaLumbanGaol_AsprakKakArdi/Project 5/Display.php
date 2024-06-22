<?php
session_start();
if(!isset($_SESSION['Login Berhasil'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2304.4110.007.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body><br>
<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="input_data.php">Our Program</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
</ul><br>
    <h1 class="come">Welcome, <?php echo $username; ?>!</h1>
    <p class="pp">you have successfully logged in</p>
<p class="isi">This is a website created to input student data using the PHP programming language.<br>
  On the next page you will be asked to fill in personal data such as name, <br>
  ID and address. However, of course you must have an account to log in on the previous page. <br>
  This website is designed to make it easier for users to fill in student biodata so that it is more focused and organized.<br>
  PHP (Hypertext Preprocessor) is an open-source programming language that is generally used to build dynamic and interactive web applications.<br> PHP can be run on a web server and combined with HTML, CSS, and JavaScript to create dynamic web pages.
 Currently, PHP is very popular among web developers because it is easy to learn and has quite strong capabilities.<br> PHP also supports many types of databases, such as MySQL, PostgreSQL, and Oracle, allowing developers to create more complex and functional web applications.
 Not only that, this programming language also has many frameworks that developers can use to speed up the<br> process of creating web applications. Some popular PHP frameworks include Laravel, CodeIgniter, and Symfony.
 As a scripting language or language that automates task execution, PHP is actually similar to JavaScript and Python.<br> However, what makes it different is that PHP is used for server-side communications. Meanwhile, JavaScript is used for the frontend and backend, and Python is only for the server side (backend).
 
 Currently, more than 78% of websites around the world use the PHP programming language. Some examples of large websites that use PHP <br>include Facebook, Wikipedia, WordPress, Yahoo, MailChimp, and Badoo.</p>
    <br>

</body>
</html>
