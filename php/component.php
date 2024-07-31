<?php

function component($productname, $productprice, $productimg, $productid, $productstock){
    $element="

        <div class=\"col-2 mx-3 my-3\">
            <form action=\"shop.php\" method=\"post\" class=\"text-center\">
                <div>
                    <img src=\"./img/product/$productimg\" alt=\"$productname\" class=\"img-fluid card-img-top product\">
                </div>
                <div class=\"card-body p-3 pt-5 pb-4\">
                    <h6 class=\"card-title\">$productname</h6>
                    <div class=\"col my-2\">
                        <div class=\"rev-star\">
                        <ion-icon name=\"star\"></ion-icon>
                        <ion-icon name=\"star\"></ion-icon>
                        <ion-icon name=\"star\"></ion-icon>
                        <ion-icon name=\"star\"></ion-icon>
                        <ion-icon name=\"star-outline\"></ion-icon>
                        </div>
                    </div>
                    <h7>
                        <span class=\"price\">Rp $productprice</span>
                    </h7>
                    <p class=\"stock mt-2\">Stok : $productstock</p>
                    <button class=\"btn addCart px-3\" role=\"button\" name=\"add\">Add to cart</button>
                    <input type='hidden' name='product_id' value='$productid'>
                </div>
            </form>
        </div>
        
    ";

    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid, $productstock){
    $element = "
        <form action=\"cart.php\" method=\"post\" class=\"cart-items rounded-pill my-2\">
            <div class=\"row p-2\">
                <div class=\"col-md-3 py-1\">
                    <img src=\"./img/product/$productimg\" alt=\"Betta Fish\" class=\"img-fluid product\">
                </div>
                <div class=\"col-md-5\">
                    <h5 class=\"pt-3\">$productname</h5>
                    <p class=\"price pt-3 mb-1\">Rp $productprice</p>
                    <p class=\"stock d-inline\">Stok : <span id=\"stock-$productid\">$productstock</span></p>
                    <a href=\"cart.php?remove=$productid\" name=\"remove\" class=\"btn mx-3 remove\" onclick=\"return confirm('Apakah anda yakin ingin menghapus produk ini dari keranjang?');\"><ion-icon name=\"trash-outline\"></ion-icon></a>
                </div>
            </div>
            <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
            <input type=\"hidden\" name=\"update_quantity\" value=\"1\">
        </form>
      
    ";

    echo $element;
}


?>