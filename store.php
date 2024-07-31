<?php
session_start();

require_once('php/createDB.php');
require_once('./php/component.php');


$db= new CreateDB("Product", "Producttb");

//Menambahkan barang baru
if(isset($_POST['add_product'])) {

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_stock = $_POST['product_stock'];
        $product_type = $_POST['product_type'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_temp_name=$_FILES['product_image']['tmp_name'];
        $product_image_folder='img/product/'.$product_image;

        $insert_query=mysqli_query($db->con, "insert into `producttb` (product_name, product_price, product_image, product_stock, product_type) values ('$product_name','$product_price','$product_image', '$product_stock', '$product_type')") or die("Insert query failed");
        if($insert_query){
            move_uploaded_file($product_image_temp_name, $product_image_folder);
            $display_message_success="Produk berhasil dimasukkan!";
        }else{
            $display_message_failed="Ada kesalahan!";
        }
}

// DELETE PRODUK
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($db->con,"Delete from `producttb` where prod_id=$delete_id") or die("Query failed");
    if($delete_query){
        $display_message_success="Produk telah terhapus!";
        // header('Location:store.php');
    }else{
        $display_message_failed="Produk belum terhapus!";
        // header('Location:store.php');
    }
}

// EDIT LOGIC
if(isset($_POST['edit_product'])){
    $edit_prod_id=$_POST['edit_prod_id'];
    $edit_product_name=$_POST['edit_product_name'];
    $edit_product_price=$_POST['edit_product_price'];
    $edit_product_type=$_POST['edit_product_type'];
    $edit_product_image=$_FILES['edit_product_image']['name'];
    $edit_product_image_tmp_name=$_FILES['edit_product_image']['tmp_name'];
    $edit_product_image_folder='img/product/'.$edit_product_image;
    $edit_product_stock=$_POST['edit_product_stock'];


    //update query
    $edit_products=mysqli_query($db->con, "Update `producttb` set product_name='$edit_product_name', product_price='$edit_product_price', product_image='$edit_product_image', product_stock='$edit_product_stock', product_type='$edit_product_type' where prod_id=$edit_prod_id");

    if($edit_products){
        move_uploaded_file($edit_product_image_tmp_name, $edit_product_image_folder);
        header('Location:store.php');
        $display_message_success="Produk telah diupdate!";
    }else{
        $display_message_failed="Ada kesalahan!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <!-- SIDEBAR -->
	<section id="sidebar">
        <div class="sidebar">
            <div class="logo d-flex align-items-center mt-5 ms-3"> 
                <img src="img/profile.jpg" class="ms-4" width="45" height="45" alt="logo">
                <span class="text fw-bold ms-3">Admin</span>
            </div>
            <ul class="side-menu mt-3">
                <li class="active">
                    <a href="store.php">
                        <i class='icon-sidebar bx bxs-shopping-bag-alt'></i>
                        <span class="text">My Store</span>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="logout">
                        <i class='icon-sidebar bx bxs-log-out-circle' ></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
	</section>
	<!-- SIDEBAR -->



        <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
		<nav>
			<form action="#">
				
			</form>
		</nav>
		<!-- NAVBAR -->
         
        <main>
        <!-- message display -->
        <?php
            if(isset($display_message_success)){
                echo "<div class=\"alert alert-success alert-dismissible w-50 z-3 position-sticky top-0\" role=\"alert\">
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
            
        <div class="head-title">
        </div>

        <div class="table-data">
            <div class="card w-100">
                <div class="button-produk">
                    <h3>Stok Produk</h3>
                    <button type="button" class="btn btn-primary add-produk ms-auto" data-bs-toggle="modal" data-bs-target="#add_product">
                        Tambah Barang
                    </button><hr>
                </div>
                <div class="head ms-auto">
                    <div class="search-recent-order">
                        <input type="search" class="ps-4" id="live_search" placeholder="Search...">
                        <button type="reset" class="refresh-btn" onclick="location.reload();"><i class='bx bx-refresh'></i></button>
                    </div>
                </div>
                <div class="order">
                    <table id="datatablesSimple">
                        <div id="searchresult"></div>
                        <thead class="card-header">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $display_product = mysqli_query($db->con, "SELECT * FROM `producttb`");
                                $num = 1;
                                if (mysqli_num_rows($display_product) > 0) {
                                    while ($row = mysqli_fetch_assoc($display_product)) {
                            ?>
                            <tr>
                                <td><?php echo $num ?></td>
                                <td><img src="img/product/<?php echo $row['product_image'];?>" style="width:120px; height:120px" alt="<?php echo $row['product_name'];?>"></td>
                                <td><?php echo $row['product_name'];?></td>
                                <td><?php echo $row['product_type'];?></td>
                                <td>Rp <?php echo $row['product_price'];?></td>
                                <td><?php echo $row['product_stock'];?></td>
                                <td>
                                    <button type="button" class="btn btn_edit_product" data-bs-toggle="modal" data-bs-target="#edit_product" 
                                        data-prod-id="<?php echo $row['prod_id']; ?>"
                                        data-prod-name="<?php echo $row['product_name']; ?>"
                                        data-prod-price="<?php echo $row['product_price']; ?>"
                                        data-prod-type="<?php echo $row['product_type']; ?>"
                                        data-prod-stock="<?php echo $row['product_stock']; ?>"
                                        data-prod-image="<?php echo $row['product_image']; ?>">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <a href="store.php?delete=<?php echo $row['prod_id'];?>" name="delete" class="btn_delete_product" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?');"><ion-icon name="trash"></ion-icon></a>

                                </td>
                            </tr>
                            <?php
                                        $num++;
                                    }
                                } else {
                                echo "<tr><td colspan='4'>Produk tidak tersedia</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </main>
    </section>
            
            
    <!-- The Modal -->
    <div class="modal fade" id="add_product">
        <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Produk</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
    
            <!-- Modal body -->
            <form action="" class="add_product" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type ="text" name="product_name" placeholder="Masukkan nama produk" class="form-control">
                    <br>
                    <input type="number" name="product_price" class="form-control" placeholder="Masukkan harga produk">
                    <br>
                    <select data-mdb-select-init class="form-select" input type="text" name="product_type" aria-label="Default select example" required>
                        <option selected>Pilih jenis produk</option>
                        <option value="ikan">Ikan</option>
                        <option value="obat">Obat ikan</option>
                        <option value="makanan">Makanan ikan</option>
                    </select>
                    <br>
                    <input type="file" name="product_image" class="input_fields form-control" required accept="image/png, image/jpg, image/jpeg">
                    <br>
                    <input type="number" name="product_stock" class="form-control" placeholder="Masukkan stok produk">
                    <br>
                    <button type="submit" class="btn btn_submit btn-primary my-3 ms-auto me-4" name="add_product" value="Add Product">Submit</button>
                </div>
            </form>
    
        </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="edit_product" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="edit_product product_container_box">
                        <input type="hidden" name="edit_prod_id" value="">
                        <img src="" alt="" width="150px" style="border-radius:50%; margin:1.5rem; margin-inline:33%">
                        <input type="text" name="edit_product_name" class="form-control" required>
                        <br>
                        <input type="number" name="edit_product_price" class="form-control" required>
                        <br>
                        <select class="form-select" name="edit_product_type" aria-label="Default select example" required>
                            <option value="ikan">Ikan</option>
                            <option value="obat">Obat ikan</option>
                            <option value="makanan">Makanan ikan</option>
                        </select>
                        <br>
                        <input type="file" name="edit_product_image" class="input_fields form-control" accept="image/png, image/jpg, image/jpeg">
                        <br>
                        <input type="number" name="edit_product_stock" class="form-control" required>
                        <br>
                        <div class="row btns">
                            <button type="reset" value="Cancel" class="col-2 btn btn_reset btn-primary my-3 ms-3">Reset</button>
                            <button type="submit" name="edit_product" value="Edit Product" class="col-2 btn btn_submit btn-primary my-3 ms-3">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




                            
    <!-- SCRIPT MODAL -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var editProductModal = document.getElementById('edit_product');
        editProductModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var prodId = button.getAttribute('data-prod-id');
            var prodName = button.getAttribute('data-prod-name');
            var prodPrice = button.getAttribute('data-prod-price');
            var prodType = button.getAttribute('data-prod-type');
            var prodStock = button.getAttribute('data-prod-stock');
            var prodImage = button.getAttribute('data-prod-image');

            // Set the values in the modal
            var modalBody = editProductModal.querySelector('.modal-body');
            modalBody.querySelector('input[name="edit_prod_id"]').value = prodId;
            modalBody.querySelector('input[name="edit_product_name"]').value = prodName;
            modalBody.querySelector('input[name="edit_product_price"]').value = prodPrice;
            modalBody.querySelector('select[name="edit_product_type"]').value = prodType;
            modalBody.querySelector('input[name="edit_product_stock"]').value = prodStock;
            modalBody.querySelector('img').src = 'img/product/' + prodImage;
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input = $(this).val();
            // alert(input);

            if(input != ""){
                $.ajax({
                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},
                    success: function(data){
                        $("#searchresult").html(data); 
                        $("#searchresult").css("display", "block");
                        $("#datatablesSimple").css("display", "none");
                    }
                });
            } else {
                $("#searchresult").css("display", "none");
            }
        });
    });
</script>

<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
