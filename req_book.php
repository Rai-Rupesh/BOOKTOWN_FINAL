<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['send'])){
    $msg=mysqli_real_escape_string($conn, $_POST['message']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_error=$_FILES['image']['error'];
    $image_folder = 'uploaded_img2/'.$image;
    
    $video=$_FILES['file']['name'];
    $video_size = $_FILES['file']['size'];
    $video_tmp_name = $_FILES['file']['tmp_name'];
    $image_error=$_FILES['image']['error'];

    $video_folder = 'uploaded_vid/'.$video;

  


    $select_message = mysqli_query($conn, "SELECT * FROM `secpro` WHERE image = '$image' AND email = '$email' AND video = '$video' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
       $message[] = 'message sent already!';
    }else{
     $add_video_query=mysqli_query($conn, "INSERT INTO `secpro`(user_id,  email, video, message,image) VALUES('$user_id',  '$email', '$video', '$msg','$image')") or die('query failed');
       if($add_video_query){
         if($image_size  > 2000000){
            $message[] = 'image or video size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            move_uploaded_file($video_tmp_name, $video_folder);
            $message[] = 'message sent successfully!';
         }
      }else{
         $message[] = 'video or image could not be added!';
      }
 
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
   <link rel="stylesheet" href="index.css">
   <link rel="stylesheet" href="copy.css">
    <title>SELL YOUR BOOK</title>
</head>
<body>
   
<?php include 'nav2.php'; ?>
<div class="wrapper">
        <div class="login_body">
            <div class="login_box">
                <h2>SELL YOUR BOOK</h2>
                <form action="req_book.php" method="post"enctype="multipart/form-data">



<div class="input_wrap">

    <input type="email" placeholder="Enter your e-Mail" name='email'required>
    </div>

    <div class="input_wrap">

    <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="input_wrap" style="color:aliceblue;">

    <input type="file" name="image" class="box">
upload image
    </div>

    <div class="input_wrap" style="color:aliceblue;">

    <input type="file" name="file" class="box" >
  upload video
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