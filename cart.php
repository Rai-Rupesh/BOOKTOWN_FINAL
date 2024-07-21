<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['update_cart'])) {
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'cart quantity updated!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="cart.css">


</head>

<body>

    <?php include 'nav2.php'; ?>

    <div class="heading">
        <h3>shopping cart</h3>
        <p> <a href="home.php"><button id="home">Home</button></a>/cart</p>
    </div>

    <section class="shopping-cart">

        <h1 class="title">Products Added</h1>
        <section id="book1" class="section-p1">
            <div class="book-container">
                <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                ?>
                        <div class="books">
                            <img class="image" src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
                            <div class="des">
                                <h5><?php echo $fetch_cart['name']; ?></h5>
                                <h4>$<?php echo $fetch_cart['price']; ?></h4>
                            </div>
                            <div class="shutter">
                                <div class="cart-link">
                                    <h4 id="cart-link3" style='color:white; border-radius:5px; height:8vh; background-color:red;'>author:<?php echo $fetch_cart['writer'] ?></h3><br>
                                        <h5 id="cart-link4" style='color:white; border-radius:5px; height:20px; background-color:red;'>category:<?php echo $fetch_cart['category'] ?></h3><br>
                                            <h5 id="cart-link3"> <button id="view" onclick="reply(<?php echo $fetch_cart['id'] ?>)">view more details</button>
                                                <script>
                                                    function reply(id) {
                                                        window.location.href = 'products_view.php?id=' + id;
                                                    }
                                                </script>
                                            </h5>
                                            <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('delete this from cart?');">
                                                <h6 style='padding-top:30px;font-size:larger;'> Delete❌
                                            </a></h6>
                                            <form action="" method="post" style='padding-top:30px;'>
                                                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                                <input type="submit" name="update_cart" value="update" class="option-btn">
                                            </form>

                                </div>
                            </div>



                            <div class="sub-total"> sub total : <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span></div>
                        </div>
                <?php
                        $grand_total += $sub_total;
                    }
                } else {
                    echo '<p class="empty">your cart is empty</p>';
                }
                ?>
            </div>
        </section>

        <div style="margin-top: 2rem; text-align:center;  background-color:black;" class="delete-button">
            <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from cart?');">Delete All</a>
        </div>

        <div class="cart-total">
            <p style="color:#fff;">Grand total : <span>$<?php echo $grand_total; ?>/-</span></p>
            <div class="flex">
                <a href="search.php" class="option-btn"><button id="continue">Continue Shopping</button> </a>
                <a href="checkout.php" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"><button id="continue"> Proceed to Checkout</button> </a>
            </div>
        </div>

    </section>








    <?php include "copyright.php"; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>