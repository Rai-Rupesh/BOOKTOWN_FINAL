<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `secpro` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_req.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>REQUEST</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">

   <h1 class="title"> SELL REQUEST </h1>

   <div class="box-container">
   <?php
   $n=0;
      $select_message = mysqli_query($conn, "SELECT * FROM `secpro`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)) {
    
   ?>
   <div class="box">
      <p> user id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
      <p> email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <p> message : <span><?php echo $fetch_message['message']; ?></span> </p>
     <p>  image : <a href="uploaded_img2/<?php echo $fetch_message['image'];  ?>" download="<?php echo $fetch_message['image'];  ?>" style="color:red;"><i class="fas fa-image    "></i> download image</a></p> 
      <p> video :<a href="uploaded_vid/<?php echo $fetch_message['video']; ?>"style="color:red;"><i class="fas fa-file-download" ></i> download video</a></p>
      <button class='delete-btn' onclick="reply(<?php echo $fetch_message['user_id']; ?>)" >reply</button>
      <a href="admin_req.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>

      
   </div>
   <?php
         };
   
   }else{
      echo '<p class="empty">you have no request!</p>';
   }
   ?>
   </div>

</section>
<script>
   function reply(userid){
      window.location.href='admin_contact.php?userid='+userid;
   }
</script>








<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>