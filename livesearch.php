<?php
session_start();

require_once('php/createDB.php');
require_once('./php/component.php');

$db = new CreateDB("Product", "Producttb");

// SEARCH 
if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $query = "SELECT * FROM producttb WHERE product_name LIKE ? OR product_type LIKE ?";
    $stmt = $db->con->prepare($query);
    $likeInput = '%' . $input . '%';
    $stmt->bind_param('ss', $likeInput, $likeInput);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<div class="order">
            <table>
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
                <tbody>';

        $num = 1;
        while ($row = $result->fetch_assoc()) {
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_stock = $row['product_stock'];
            $product_type = $row['product_type'];
            $product_image = $row['product_image'];

            echo '<tr>
                <td>' . $num . '</td>
                <td><img src="img/product/' . $product_image . '" style="width:120px; height:120px" alt="' . $product_name . '"></td>
                <td>' . $product_name . '</td>
                <td>' . $product_type . '</td>
                <td> Rp ' . $product_price . '</td>
                <td>' . $product_stock . '</td>
                <td>
                <button type="button" class="btn btn_edit_product" data-bs-toggle="modal" data-bs-target="#edit_product" 
                    data-prod-id="' . $row['prod_id'] . '"
                    data-prod-name="' . $product_name . '"
                    data-prod-price="' . $product_price . '"
                    data-prod-type="' . $product_type . '"
                    data-prod-stock="' . $product_stock . '"
                    data-prod-image="' . $product_image . '">
                    <ion-icon name="create-outline"></ion-icon>
                </button>
                <a href="store.php?delete=' . $row['prod_id'] . '" name="delete" class="btn_delete_product" onclick="return confirm(\'Apakah anda yakin ingin menghapus produk ini?\');"><ion-icon name="trash"></ion-icon></a>
            </td>
            </tr>';
            $num++;
        }

        echo '</tbody>
            </table>
        </div>';
    } else {
        echo '<div>No results found</div>';
    }

    $stmt->close();
}
?>
