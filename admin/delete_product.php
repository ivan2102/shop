<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {

    ?>

    <?php

    if(isset($_GET['delete_product'])) {

        $product_id = $_GET['delete_product'];

        $query_delete_product = query("DELETE FROM products WHERE product_id='$product_id'");
        confirm($query_delete_product);

        if($query_delete_product) {

            echo "<script>alert('Product deleted successfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }

?>




<?php } ?>