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
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li class="services">
                <a href="genres.php">Genres</a>
                <!-- DROPDOWN MENU -->
                <ul class="dropdown">
                <li><a href="thrill.php">Thriller</a></li>
                <li><a href="romance.php">Romance</a></li>
                <li><a href="manga.php">Manga</a></li>
                <li><a href="search.php">MORE</a></li>
                </ul>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="search.php" class="fas fa-search"></a></li>

            </div>
        </ul>
    </nav>
