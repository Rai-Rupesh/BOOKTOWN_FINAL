<?php

include 'config.php';

if (isset($_POST['submit'])) {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  $user_type = $_POST['user_type'];

  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

  if (mysqli_num_rows($select_users) > 0) {
    $message[] = 'user already exist!';
  } else {
    if ($pass != $cpass) {
      $message[] = 'confirm password not matched!';
    } else {
      mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login.php');
    }
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="signup.css">
  <title>SignUp</title>
</head>

<body>

  <div class="wrapper">
    <a href="index.php">
      <h1 style="color: #e50914">BOOK TOWN</h1>
    </a>
    <div class="login_body">
      <div class="login_box">
        <h2>Sign up</h2>
        <form action="signUp.php" method="post">
          <div class="input_wrap">
            <input type="text" placeholder="Enter your name" name="name" required>
          </div>
          <div class="input_wrap">
            <input type="email" placeholder="Enter your e-Mail" name='email'required>
          </div>
          <div class="input_wrap">
            <input type="password" placeholder="Enter your password" name='password'required>
          </div>
          <div class="input_wrap">
            <input type="password" placeholder="confirm password" name='cpassword'required>
          </div>
          <select name="user_type" class="userType">
            
            <option value="user">user</option>
            <option value="user">admin</option>

          </select>
          <div class="input_wrap">
            <button type="submit" name="submit">sign up</button>
          </div>
          <div class="LOGIN" style="color: white;">
            All Ready Account?!!!!😎
            <a href="login.php" class="sginUp">LOGIN HERE</a>
          </div>
        </form>
        <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '
      <div class="message">
         <p style="color:red;,background-color:none;">' . $message . '</p>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
  }
  ?>
      </div>
    </div>
  </div>
</body>

</html>