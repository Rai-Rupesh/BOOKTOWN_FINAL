<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   } 

   elseif(!preg_match('/^[0-9]{10}$/',$number)){
    $message[] = 'Invalid phone number!';
   }

   elseif(!preg_match('/^[A-Za-z\s]+$/',$name)){
    $message[] = 'Invalid name!';

   }
   
   else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="contact.css">
   <link rel="stylesheet" href="index.css">
   <link rel="stylesheet" href="copy.css">



</head>
<body>
   
<?php include 'nav2.php'; ?>
<div class="wrapper">
        <div class="login_body">
            <div class="login_box">
                <h2>Contact Us</h2>
                <form action="" method='post'>
                <div class="input_wrap">
                        <input type="text" placeholder="Enter your name" name='name'required>
                    </div>
                    <div class="input_wrap">
                        <input type="email" placeholder="Enter your e-Mail" name='email'required>
                    </div>
                    <div class="input_wrap">
                        <input type="number" placeholder="Enter your number" name='number'  required>
                    </div>
                    <div class="input_wrap">
                        <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="input_wrap">
                        <button type="submit" name="send" value="login now" >Send</button>

                    </div>

                </form>
                
            </div>

        </div>

    </div>




<?php include 'copyright.php'; ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>