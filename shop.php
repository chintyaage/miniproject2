<?php

//start session
session_start();

require_once('php/createDB.php');
require_once('./php/component.php');

//create instance of Createdb class
$database = new CreateDB(dbname:"Product", tablename:"Producttb");
$dbase = new CreateDB("Product", "tbl_user");
$datab = new CreateDB("Product", "tbl_cart");

if (isset($_POST['add'])) {
    // Fetch user data
    if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $data = mysqli_query($dbase->con, "SELECT * FROM `tbl_user` WHERE email = '$email'");
    $fetchdata = mysqli_fetch_assoc($data);
    $user_id = $fetchdata["user_id"];
    $_SESSION['user_id'] = $user_id;

    // Fetch product data
        $select_product = mysqli_query($database->con, "SELECT * FROM `producttb` WHERE prod_id = '".$_POST['product_id']."'");
        if (mysqli_num_rows($select_product) > 0) {
            $fetch_product = mysqli_fetch_assoc($select_product);
            $name = $fetch_product['product_name'];
            $price = $fetch_product['product_price'];
            $image = $fetch_product['product_image'];
            $stok = $fetch_product['product_stock'];

            // Check if product is already in the cart
            $select_cart = mysqli_query($datab->con, "SELECT * FROM `tbl_cart` WHERE name = '$name' AND user_id = '$user_id'");
            if (mysqli_num_rows($select_cart) > 0) {
                echo "<script>alert('Produk sudah ada dalam keranjang!')</script>";
            } else {
                // Insert product into cart
                $query = "INSERT INTO `tbl_cart`(`user_id`, `product_id`,  `name`, `price`, `image`) VALUES ('$user_id', '".$_POST['product_id']."', '$name', '$price', '$image')";
                $insert_query = mysqli_query($datab->con, $query);
                if ($insert_query) {
                    echo "<script>alert('Produk berhasil masuk ke dalam keranjang!')</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan produk ke keranjang!')</script>";
                }
            }
        } else {
            echo "<script>alert('Produk tidak ditemukan!')</script>";
        }

    }

}



// PROFILE

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $data = mysqli_query($dbase->con, "SELECT * FROM `tbl_user` WHERE email = '$email'");
    $fetchdata = mysqli_fetch_assoc($data);
    $user_id = $fetchdata["user_id"];
    $_SESSION['user_id'] = $user_id;
} else {
    echo "<script>alert('Gagal login')</script>";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoping Page</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shop.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top" id="btnNavbar">
        <img src="img/logo.png" alt="logo AquaZone" width="150" class="ms-5">
        <div class="container-fluid" >
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

    <section id="informasi_user">
        <div class="container-fluid d-flex justify-content-center align-items-center mt-5 pt-5">
            <div class="info-user mt-5">
                <p class="text-center selamat-datang">Selamat Berbelanja, <strong><?php echo $fetchdata['name']; ?></strong>!</p>
                <div class="card shadow-lg">
                    <div class="row p-4 mx-3">
                        <div class="col-2">
                            <p><b>Nama</b></p>
                            <p><b>ID Pembeli</b></p>
                            <p><b>Email</b></p>
                            <p><b>Alamat</b></p>
                        </div>
                        <div class="col-1">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="col-8">
                            <p><?php echo $fetchdata['name']; ?></p>
                            <p><?php echo $fetchdata['user_id']; ?></p>
                            <p><?php echo $fetchdata['email']; ?></p>
                            <p><?php echo $fetchdata['alamat']; ?></p>
                        </div>
                        <a href="index.php" class="btn btn-primary logout ms-auto" onclick="return confirm('Apakah anda yakin ingin keluar dari halaman ini?');">Logout</a>
                    </div>
                    
                </div>
            </div> 
        </div>
    </section>

    <section id="ikan">
        <div class="mt-5 pt-5">
            <div class="product-fish mt-5">
                <div class="title mt-5 pt-5">
                    <h1 class="title-shop ps-4 w-25">Ikan Hias</h1>
                </div>

                <div class="container-fluid">
                    <div class="row text-center py-5 mx-5 justify-content-evenly">
                        <?php
                            $select_product = mysqli_query($database->con, 'SELECT * FROM `producttb` WHERE product_type = "ikan"');
                            if (mysqli_num_rows($select_product) > 0) {
                                while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                                    component($fetch_product['product_name'], $fetch_product['product_price'], $fetch_product['product_image'], $fetch_product['prod_id'], $fetch_product['product_stock']);
                                }
                            } else {
                                echo "<div class='empty_text'>Produk tidak tersedia.</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ikan">
        <div class="">
            <div class="product-fish mt-5">
                <div class="title mt-5 pt-5">
                    <h1 class="title-shop ps-4 w-25">Makanan Ikan</h1>
                </div>

                <div class="container-fluid">
                    <div class="row text-center py-5 mx-5 justify-content-evenly">
                        <?php
                            $select_product = mysqli_query($database->con, 'SELECT * FROM `producttb` WHERE product_type = "makanan"');
                            if (mysqli_num_rows($select_product) > 0) {
                                while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                                    component($fetch_product['product_name'], $fetch_product['product_price'], $fetch_product['product_image'], $fetch_product['prod_id'], $fetch_product['product_stock']);
                                }
                            } else {
                                echo "<div class='empty_text'>Produk tidak tersedia.</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fish">
        <div class="">
            <div class="product-fish mt-5">
                <div class="title mt-5 pt-5">
                    <h1 class="title-shop ps-4 w-25">Obat Ikan</h1>
                </div>

                <div class="container-fluid">
                    <div class="row text-center py-5 mx-5 justify-content-evenly">
                        <?php
                            $select_product = mysqli_query($database->con, 'SELECT * FROM `producttb` WHERE product_type = "obat"');
                            if (mysqli_num_rows($select_product) > 0) {
                                while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                                    component($fetch_product['product_name'], $fetch_product['product_price'], $fetch_product['product_image'], $fetch_product['prod_id'], $fetch_product['product_stock']);
                                }
                            } else {
                                echo "<div class='empty_text'>Produk tidak tersedia.</div>";
                            }
                        ?>
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