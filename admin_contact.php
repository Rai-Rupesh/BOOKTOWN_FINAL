<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['send']) && isset($_POST['user_id'])){
   $userid=$_GET['userid'];
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
    $user_id=$_POST["user_id"];
    $select_message = mysqli_query($conn, "SELECT * FROM `message2` WHERE message = '$msg' ") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
       $message[] = 'message sent already!';
    }else{
       mysqli_query($conn, "INSERT INTO `message2`(user_id, message) VALUES('$userid', '$msg')") or die('query failed');
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

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">


   <div class="box-container">



   </div>

</section>

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title">send message</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>message</h3>
      <textarea name="message"  cols="30" rows="10" class="box" placeholder="message"></textarea> 
      <input type="hidden" value="<?php echo $userid; ?>" name="user_id" > 
      <input type="submit" value="message" name="send" class="btn">
   </form>


</section>



<!-- product CRUD section ends -->







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>