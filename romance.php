<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];
  $product_writer=$_POST['product_writer'];
  $product_category=$_POST['product_category'];
  $product_type=$_POST['product_type'];
  $product_dtls=$_POST['product_dtls'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

  if (mysqli_num_rows($check_cart_numbers) > 0) {
    $message[]= 'already added to cart!';
  } else {
    mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image,writer,category,type,dtls) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image','$product_writer','$product_category','$product_type','$product_dtls')") or die('query failed');
    $message[] = 'product added to cart!';
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <title>SCi-FI</title>
</head>

<body>
<?php include 'nav2.php'; ?>
<section id="book1" class="section-p1">

   <h1 class= "title">Romance 📚 </h1>

   <div class="book-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where `category` ='romance'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="books">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="hidden" name="product_writer" value="<?php echo $fetch_products['writer']; ?>">
      <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>">
      <input type="hidden" name="product_type" value="<?php echo $fetch_products['type']; ?>">
      <input type="hidden" name="product_dtls" value="<?php echo $fetch_products['dtls']; ?>">
      
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      <input type="submit" value="view details" name="view_dtls" class="btn">

     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>

</section>
</body>

</html>