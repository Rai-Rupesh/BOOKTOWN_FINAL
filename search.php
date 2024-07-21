<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">

    <title>Document</title>
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<nav class="navbar">
      <!-- LOGO -->
      <div class="logo"><a href="">BOOK TOWN</a></div>
      <!-- NAVIGATION MENU -->
      <ul class="nav-links">
            <!-- USING CHECKBOX HACK -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <!-- NAVIGATION MENUS -->
            <div class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li class="services">
                <a href="genres.php">Genres</a>
                <!-- DROPDOWN MENU -->
                <ul class="dropdown">
                <li><a href="sci-fi.php">Sci-Fi</a></li>
                <li><a href="romance.php">Romance</a></li>
                <li><a href="fiction.php">Fiction</a></li>
                <li><a href="search.php">sMORE</a></li>
                </ul>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
            </div>
        </ul>
</nav>


    <section class="search">
    <form action="" method="post"  class="search-form">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="submit" name="submit" value="search" class="btn" id="btn02">
   </form>
    </section>


<section id="book1" class="section-p1">
    <div class="book-container">
        <?php
        if (isset($_POST['submit'])) {
            $search_item = $_POST["search"];
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%' OR type  LIKE '%{$search_item}%'  OR writer  LIKE '%{$search_item}%' OR category Like '%{$search_item}%'") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
        ?>
       
      <from class="books" method="post">
        
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
        <div class="des">
          <span><?php echo $fetch_products['type']; ?></span>
          <h5><?php echo $fetch_products['name']; ?></h5>
          <div class="writer">
            <h6><?php echo $fetch_products['writer']; ?></h6>
          </div>
          <h4>$<?php echo $fetch_products['price']; ?></h4>
        </div>
        <div class="shutter">
          <div class="cart-link">
            <h5 id="cart-link3"><button onclick="reply(<?php echo $fetch_products['id']; ?>)">SHOP NOW🛒</button></h5>
            <script>
              function reply(id){
                window.location.href='products_viw.php?id='+id;

              }
       
            </script>
          </div>
        </div>
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="hidden" name="writer" value="<?php echo $fetch_products['writer']; ?>">
      <input type="hidden" name="product_type" value="<?php echo $fetch_products['type']; ?>">
      <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']; ?>">
      <input type="hidden" name="product_dtls" value="<?php echo $fetch_products['dtls']; ?>">


      </from>
        <?php
                }
            } else {
                echo '<p class="empty">no result found!</p>';
            }
        } else {
            echo '<p class="empty">search something!</p>';
        }
        ?>



    </div>


</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>