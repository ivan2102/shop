<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php 

if(isset($_GET['delete_term'])) {

    $term_id = $_GET['delete_term'];

    $query_delete_term = query("DELETE FROM terms WHERE term_id='$term_id'");
    confirm($query_delete_term);

    if($query_delete_term) {

        echo "<script>alert('One term has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";
    }
}


?>

<?php } ?>