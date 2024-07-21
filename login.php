<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="copy.css">

    <title>LogIn</title>
</head>
<body>


    <div class="wrapper">
        <a href="index.html"><h1 style='color: #e50914;'>BOOK TOWN</h1></a>
        <div class="login_body">
            <div class="login_box">
                <h2>Sign in</h2>
                <form action="" method='post'>
                    <div class="input_wrap">
                        <input type="email" placeholder="Enter your e-Mail" name='email'required>
                    </div>
                    <div class="input_wrap">
                        <input type="password" placeholder="Enter your password" name='password'required>
                    </div>
                    <div class="input_wrap">
                        <button type="submit" name="submit" value="login now" >SIGN in</button>

                    </div>
                    <div class="sign_up">
                        <h3>NEW HERE!!!!👉</h3>
                        <a href="signUp.php" class="sginUp">
                            <h3>REGISTER HERE 😊</h3>
                        </a>
                    </div>
                </form>
                <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span style="color:red;">'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
            </div>

        </div>

    </div>
    <?php include 'copyright.php'; ?>

</body>
</html>