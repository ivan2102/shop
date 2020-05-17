<?php require_once("config.php"); ?>  

<?php 


if(isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $query_delete_product = query("DELETE FROM cart WHERE product_id='$product_id'");
    confirm($query_delete_product);

    if($query_delete_product) {

        echo "<script>alert('Product has been deleted successfully')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
    }
}







 ?>