<?php

include 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="copy.css">

  <link rel="stylesheet" href="mainfootr.css">
  

  <title>Book Town</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <?php include 'nav.php'; ?>
  <section id="hero">
    <h4>Hurry up🏃‍♀️🏃‍♀️</h4>
    <h2>Super😍value deals</h2>
    <h1>On all books📚</h1>
    <p><strong> save more with coupons & up to 70% off😊</p></strong>
    <button>Shop now</button>

  </section>
  <!-- feature  -->
  <section id="feature" class="section-p1">
    <div class="fet-box">
      
      <img src="image/features/f7.jpg" alt="free shipping">
      
      <h6>Free shipping</h6>

    </div>

    <div class="fet-box">
      <img src="image/features/f8.png" alt="online order">
      <h6>Online Oreder</h6>

    </div>

    <div class="fet-box">
      <img src="image/features/f9.png" alt="save money">
      <h6>Save money</h6>

    </div>

    <div class="fet-box">
      <img src="image/features/f10.png" alt="free shipping">
      <h6>service</h6>

    </div>


  </section>
  <!-- End feature  -->

  <!-- start book feature -->
  <section id="book1" class="section-p1">
    
    <h2 class="features_bbok">NEW Arrivals<span>Books📚</span> </h2>
      <p>new second hand books</p>
      <div class="book-container">
        
      <?php  
           $select_products = mysqli_query($conn, "SELECT * FROM `products` where `type` ='second-hand' LIMIT 8") or die('query failed');
           if(mysqli_num_rows($select_products) > 0){
              while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
  
        <from class="books">
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
              <h3 id="cart-link2"><a href="products.php">SHOP NOW🛒</a></h3><br>
              <h5 id="cart-link3"><a href="sec-hand.php">view more</a></h5>
  
            </div>
          </div>
          <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
        <input type="hidden" name="writer" value="<?php echo $fetch_products['writer']; ?>">
        <input type="hidden" name="product_type" value="<?php echo $fetch_products['type']; ?>">
        </from>
  
        <?php
           }
        }else{
           echo '<p class="empty">no products added yet!</p>';
        }
        ?>
      </div>
    </section>
  <!-- End book feature  -->
  <!-- star banner  -->
  <section id="footer" class="sec">
    <h4>discount</h4>
    <h2>Up to <span>70% off</span>- All books</h2>
    <button class="normal">Explore More</button>
  </section>
  <!-- End banner  -->
  <!-- new arrivals  -->




  <section id="book1" class="section-p1">
    
  <h2 class="features_bbok">Featured<span>Books📚</span> </h2>
    <p>new love story books</p>
    <div class="book-container">
      
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where `category` ='romance' LIMIT 8") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>

      <from class="books">
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
            <h3 id="cart-link2"><a href="products.php">SHOP NOW🛒</a></h3><br>
            <h5 id="cart-link3"><a href="romance.php">view more</a></h5>

          </div>
        </div>
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="hidden" name="writer" value="<?php echo $fetch_products['writer']; ?>">
      <input type="hidden" name="product_type" value="<?php echo $fetch_products['type']; ?>">
      </from>

      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
    </div>
  </section>
  <!-- End new arrivals -->
  <section id="footer2" class="sec">
    <h1>HAVE ANY QUESTION</h1>
    <p>Write Your Query And Any Think You Want To Ask.</p>
    <a href="contact.php"><button class="normal">CONTACT</button></a>
  </section>


<!--       -->

  
  <section id="book1" class="section-p1">
    
  <h2 class="features_bbok">Featured<span>Books📚</span> </h2>
    <p>new manga</p>
    <div class="book-container">
      
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where `category` ='manga' LIMIT 8") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>

      <from class="books">
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
            <h3 id="cart-link2"><a href="products.php">SHOP NOW🛒</a></h3><br>
            <h5 id="cart-link3"><a href="manga.php">view more</a></h5>

          </div>
        </div>
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="hidden" name="writer" value="<?php echo $fetch_products['writer']; ?>">
      <input type="hidden" name="product_type" value="<?php echo $fetch_products['type']; ?>">
      </from>

      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
    </div>
  </section>
  <!-- End new  -->

<!-- second hand books -->


  
<section id="book1" class="section-p1">
    
<h2 class="features_bbok">Featured<span>Books📚</span> </h2>
    <p>new sci-fi</p>
    <div class="book-container">
      
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where `category` ='sci-fi' LIMIT 8") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>

      <from class="books">
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
            <h3 id="cart-link2"><a href="products.php">SHOP NOW🛒</a></h3><br>
            <h5 id="cart-link3"><a href="sci-fi.php">view more</a></h5>

          </div>
        </div>
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="hidden" name="writer" value="<?php echo $fetch_products['writer']; ?>">
      <input type="hidden" name="product_type" value="<?php echo $fetch_products['type']; ?>">
      </from>

      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
    </div>
  </section>
  <!-- End new  -->

  <!-- team  -->


  <?php include 'footer.php'; ?>

  <!-- End Footer  -->



  <?php include 'copyright.php'; ?>

</body>


</html>