
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="hal-1">
        <main class="container">
            <form action="login.php" method="POST">
                <h2>Login</h2>
                <p>Please enter your email and password</p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <p class="alert-email"></p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <input type="submit" value="Login">
            </form>
        </main>
    </div>

    
</body>
</html>