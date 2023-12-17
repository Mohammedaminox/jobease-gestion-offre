<?php
include('../../models/User.php');

session_start();
session_destroy();

$register = new Authenticate ();
if (isset($_POST['register_btn'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['confirm_password'];
  
  if($password == $password_confirm){
    $register->registerUser($username,$email,$password);
  }else{
    echo '<h2>Register failed</h2>';
  }
}


?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="../../../public/styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="../../controllers/AuthController.php" method="POST">
      <div class="input-box">
        <input type="text" name="username" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name="register_btn" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="../auth/login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>