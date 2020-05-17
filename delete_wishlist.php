<?php require_once("config.php"); ?>


<?php 

if(isset($_GET['wishlist_id'])) {

    $wishlist_id = $_GET['wishlist_id'];

    $query_delete_wishlist = query("DELETE FROM wishlist WHERE wishlist_id='$wishlist_id'");
    confirm($query_delete_wishlist);

    if($query_delete_wishlist) {

        echo "<script>alert('Wishlist deleted successfully')</script>";
        echo "<script>window.open('wishlist.php','_self')</script>";
    }
}




?>