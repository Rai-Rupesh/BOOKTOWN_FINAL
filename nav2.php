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

<nav class="navbar">
   <!-- LOGO -->
   <div class="logo"><a href="home.php">BOOK TOWN</a></div>
   <!-- NAVIGATION MENU -->
   <ul class="nav-links">
      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>
      <!-- NAVIGATION MENUS -->
      <div class="menu">
         <?php
         $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $cart_rows_number = mysqli_num_rows($select_cart_number);
         ?>

         <?php
         $select_msg_number = mysqli_query($conn, "SELECT * FROM `message2` where user_id='$user_id'") or die('query failed');
         $msg_rows_number = mysqli_num_rows($select_msg_number);
         ?>
         <li><a href="search.php" class="fas fa-search"></a></li>
         <li><a href="sec-hand.php">Second-hand books</a></li>

         <li class="services">
            <a href="genres.php">Genres</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
               <li><a href="sci-fi.php">Sci-fi</a></li>
               <li><a href="romance.php">Romance</a></li>
               <li><a href="manga.php">Manga</a></li>
               <li><a href="search.php">MORE</a></li>
            </ul>
         </li>
         <li><a href="cart.php">cart<i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a></li>
         <li><a href="orders.php">orders</a></li>
         <li><a href="req_book.php">sell book</a></li>
         <li><a href="about.php">About</a></li>
         <li><a href="contact.php">Contact</a></li>
         <li><a href="user_contact.php"><i class="fas fa-solid fa-message"></i>  <span>(<?php echo $msg_rows_number; ?>)</span></a></li>
         <li><a href="logout.php">Logout</a></li>

      </div>
   </ul>
</nav>