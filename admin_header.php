<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo"><span>STORE </span>ADMIN</a>

      <nav class="navbar">
         <?php
         $select_order_number = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
         $order_rows_number = mysqli_num_rows($select_order_number);
         ?>

         <?php
         $select_users_number = mysqli_query($conn, "SELECT * FROM `users` ") or die('query failed');
         $users_rows_number = mysqli_num_rows($select_users_number);
         ?>


         <?php
         $select_message_number = mysqli_query($conn, "SELECT * FROM `message` ") or die('query failed');
         $message_rows_number = mysqli_num_rows($select_message_number);
         ?>

         <?php
         $select_req_number = mysqli_query($conn, "SELECT * FROM `secpro` ") or die('query failed');
         $req_rows_number = mysqli_num_rows($select_req_number);
         ?>

<?php
         $select_pro_number = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed');
         $pro_rows_number = mysqli_num_rows($select_pro_number);
         ?>
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">products <span>(<?php echo $pro_rows_number; ?>)</span></a>
         <a href="admin_orders.php">orders <span>(<?php echo $order_rows_number; ?>)</span></a>
         <a href="admin_users.php">users <span>(<?php echo $users_rows_number; ?>)</span></a>
         <a href="admin_contacts.php">messages <span>(<?php echo $message_rows_number; ?>)</span></a>
         <a href="admin_req.php">Request box <span>(<?php echo $req_rows_number; ?>)</span></a>


      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="signUp.php">register</a></div>
      </div>

   </div>

</header>