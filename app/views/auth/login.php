<?php
include('../../models/User.php');

session_start();
session_destroy();


$login = new Authenticate ();
if (isset($_POST['email']) && isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $login->loginUser($email,$password);
}


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | CodingLab</title>
  <link rel="stylesheet" href="../../../public/styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Login Form</span></div>
      <h1></h1>
      <form action="../../controllers/AuthController.php" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="email" placeholder="Email or Phone" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="pass"><a href="#">Forgot password?</a></div>
        <div class="row button">
          <input type="submit" name="login_btn" value="Login">
        </div>
        <span style="color:red;"></span>
        <div class="signup-link">Not a member? <a href="../auth/register.php">Signup now</a></div>
      </form>
    </div>
  </div>

</body>

</html>