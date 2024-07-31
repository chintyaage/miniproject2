<?php
// Start session
session_start();

require_once('php/createDB.php');
require_once('./php/component.php');

// Create database instances
$db = new CreateDB("Product", "Producttb");
$dbase = new CreateDB("Product", "tbl_user");
$datab = new CreateDB("Product", "tbl_cart");

if(isset($_GET['remove'])){
    $delete_id=$_GET['remove'];
    $delete_query=mysqli_query($datab->con,"Delete from `tbl_cart` where product_id=$delete_id") or die("Query failed");
    if($delete_query){
        // header('Location:cart.php');
        $display_message_success="Produk telah terhapus!";
    }else{
        $display_message_failed="Produk belum terhapus!";
        // header('Location:cart.php');
    }
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$data = mysqli_query($dbase->con, "SELECT * FROM `tbl_user` WHERE user_id = '$user_id'");
$fetchdata = mysqli_fetch_assoc($data);


$cart = mysqli_query($datab->con, "SELECT * FROM `tbl_cart`");
$fetchcart = mysqli_fetch_assoc($cart);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cart.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top" id="btnNavbar">
        <img src="img/logo.png" alt="logo AquaZone" width="150" class="ms-5">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav gap-5 m-2">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="shop.php">Shop</a>
                    <div class="vr"></div>
                    <div class="collapse navbar-collapse me-5" id="navbarNavAltMarkup">
                        <div class="mr-auto"></div>
                        <div class="navbar-nav">
                            <a href="cart.php" class="nav-item nav-link">
                                <div class="cart position-relative">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                                    </svg>
                                    <?php
                                        $data = mysqli_query($dbase->con, "SELECT * FROM `tbl_user` WHERE user_id = '$user_id'");
                                        $fetchdata = mysqli_fetch_assoc($data);
                                        $email = $fetchdata["email"];

                                        $total_product = mysqli_query($datab->con, "SELECT * FROM `tbl_cart` WHERE user_id = '$user_id'");
                                        $produk = 0;
                                        $num_product = mysqli_num_rows($total_product);

                                        if ($data == $total_product ) {
                                            echo"<span id=\"cart_count\" class=\"position-absolute d-flex justify-content-center top-0 start-100\">$num_product</span>";
                                        }else{
                                            echo"<span id=\"cart_count\" class=\"position-absolute d-flex justify-content-center top-0 start-100\">0</span>";
                                        }
                                    ?>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    

    <?php
        if(isset($display_message_success)){
            echo "<div class=\"alert alert-success alert-dismissible w-25 z-3 position-sticky top-0 m-5\" role=\"alert\">
                <span>$display_message_success</span>
                <button type=\"button\" class=\"btn-close ms-auto\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";
        }

        if(isset($display_message_failed)){
            echo "<div class=\"alert alert-warning alert-dismissible w-50\" role=\"alert\">
            <span>$display_message_failed</span>
            <button type=\"button\" class=\"btn-close ms-auto\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
        }
    ?>

    <section id="product">
        <div class="container-fluid">
            <div class="row px-5 my-5">
                <div class="col-md-7">
                    <div class="shopping-cart">
                        <h1 class="title">My Cart</h1>
                        <hr>

                        <div class="container">


                            <?php

                                $data = mysqli_query($dbase->con, "SELECT * FROM `tbl_user` WHERE user_id = '$user_id'");
                                $product = mysqli_query($datab->con, "SELECT * FROM `tbl_cart` WHERE user_id = '$user_id'");

                                if ($data && $product) {

                                    $select_cart = mysqli_query($datab->con, "SELECT * FROM `tbl_cart` WHERE user_id = '$user_id'");
                                    $total_biaya = 0;

                                    if (mysqli_num_rows($select_cart) > 0) {
                                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                            $product_id = $fetch_cart['product_id'];

                                            $select_product = mysqli_query($datab->con, "SELECT * FROM `producttb` WHERE prod_id = '$product_id'");
                                            if (mysqli_num_rows($select_product) > 0) {
                                                while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                                                    cartElement($fetch_product['product_image'], $fetch_product['product_name'], $fetch_product['product_price'], $fetch_product['prod_id'], $fetch_product['product_stock']);
                                                    $total_biaya += (int)$fetch_product['product_price'];
                                                }
                                            } else {
                                                echo "Product not found";
                                            }
                                        }
                                    } else {
                                        echo "Belum ada produk di keranjang";
                                    }
                                } else {
                                    echo "Error in fetching data";
                                }
                                ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>