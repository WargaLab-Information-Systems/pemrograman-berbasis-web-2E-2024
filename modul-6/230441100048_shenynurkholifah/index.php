<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Login Page</title>
  </head>
  <body>
    <div class="container" id="signUp" style="display: none">
      <h1 class="form-title">REGISTER</h1>
      <form action="register.php" method="post">
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="text" name="fName" id="fName" placeholder="First Name" required />
          <label for="fName">First Name</label>
        </div>
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="text" name="lName" id="lName" placeholder="Last Name" required />
          <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" id="email" placeholder="email" required />
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" id="password" placeholder="password" required />
          <label for="password">Password</label>
        </div>
        <input type="submit" class="btn" value="Sign Up" name="signUp" />
      </form>
      <div class="links">
        <p>Already Have Account?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
      <h1 class="form-title">Sign In</h1>
      <form action="register.php" method="post">
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" id="email" placeholder="email" required />
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" id="password" placeholder="password" required />
          <label for="password">Password</label>
        </div>
        <div class="recover">
          <a href="#">Recover Password</a>
        </div>
        <input type="submit" class="btn" value="Sign In" name="signIn" />
      </form>
      <div class="links">
        <p>Don`n Have Acoount yet?</p>
        <button id="signUpButton">Sign Up</button>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
