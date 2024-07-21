<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact  us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin css/admin_style.css">
   <link rel="stylesheet" href="index.css">


</head>
<body>
   
<?php include 'nav2.php'; ?>

<section class="messages">

   <h1 class="title"> messages </h1>

   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message2` where user_id='$user_id'") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">

      <p> message : <span><?php echo $fetch_message['message']; ?></span> </p>
      <p> Our Email : <a href="ankit.dhivar2001@gmail.com" style="color:black;">ankit.dhivar2001@gmail.com</a></p>
      <a href="contact.php" style="color:white-smoke;" class="delete-btn">send message<i class="fa fa-reply" aria-hidden="true" ></i></a>

      
      
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">you have no messages!</p>';
      
   }
   ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>