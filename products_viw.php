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
  $product_writer = $_POST['product_writer'];
  $product_category = $_POST['product_category'];
  $product_type = $_POST['product_type'];
  $product_dtls = $_POST['product_dtls'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

  if (mysqli_num_rows($check_cart_numbers) > 0) {
    $message[] = 'book already added to cart!';
  } else {
    mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image,writer,category,type,dtls) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image','$product_writer','$product_category','$product_type','$product_dtls')") or die('query failed');
    $message[] = $product_name . ' added to cart!';
  }
}
?>




<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="p_dtls.css">
  <link rel="stylesheet" href="copy.css">
  <link rel="stylesheet" href="mainfootr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <title>Book Details</title>
  <!-- <script>
history.pushState({},'home',"home.php")

  </script> -->
</head>

<body>
  <?php include 'nav2.php'; ?>

  <div class="container">
    <?php
    error_reporting(0);
    $id = $_GET['id'];
    if ($id>0) {

      $select_products = mysqli_query($conn, "SELECT * FROM `products` where `id` ='$id'") or die('query failed');
      if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {

          $name = $fetch_products['name'];
          $Author_name = $fetch_products['writer'];
          $price = $fetch_products['price'];
          $details = $fetch_products['dtls'];
          $image = $fetch_products['image'];
          $category = $fetch_products['category'];
          $type = $fetch_products['type'];
        }
      }

      $book = [
        'name' => $name,
        'author' => $Author_name,
        'price' => $price,
        'details' => $details,
        'image' => $image,
        'type' => $type,
        'category' => $category
      ];
    } else {
      $book = [
        'name' => "DemonSlyer",
        'author' => "juju-siki",
        'price' => "3",
        'details' => "DEmon attecs all over the world and demon slayer try save the world",
        'image' => "demon_slayer.jpg",
        'type' => "first-hand",
        'category' => "manga"
      ];
    }

    ?>

    <h1>Name : <?php echo $book['name']; ?></h1>
    <p>By : <?php echo $book['author']; ?></p>
    <p>Category : <?php echo $book['category']; ?></p>
    <p>Type : <?php echo $book['type']; ?></p>
    <p class="price">$<?php echo $book['price']; ?></p>
    <div class="book-image">
      <img src="uploaded_img/<?php echo $book['image']; ?>" alt="Book Image">
    </div>
    <div class="details">
      <h2>Book Details</h2>
      <p><?php echo $book['details']; ?></p>
    </div>
    <div class="add-to-cart">
      <form action="" method="post">
        <input type="hidden" name="product_name" value="<?php echo $book['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $book['price']; ?>">
        <input type="hidden" name="product_writer" value="<?php echo $book['author']; ?>">
        <input type="hidden" name="product_category" value="<?php echo $book['category']; ?>">
        <input type="hidden" name="product_type" value="<?php echo $book['type']; ?>">
        <input type="hidden" name="product_dtls" value="<?php echo $book['details']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $book['image']; ?>">
        <div class=".quantity-controls">
          <input type="number" id="quantity" name="product_quantity" min="1" value="1">
        </div>
        <button type="submit" name="add_to_cart">Add to Cart</button>
      </form>
    </div>
  </div>


  <section id="book1" class="section-p1">

    <h1 class="title"><?php echo $book['category'] ?> 📚 </h1>

    <div class="book-container">

      <?php
      $book_category = $book['category'];
      $select_products = mysqli_query($conn, "SELECT * FROM `products` where `category` = '$book_category'     ") or die('query failed');
      if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
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
          </form>
      <?php
        }
      } else {
        echo '<p class="empty">no products added yet!</p>';
      }
      ?>

    </div>

  </section>













  <?php include 'footer.php'; ?>
  <?php include 'copyright.php'; ?>

  <script src="js/script.js"></script>



</body>

</html>