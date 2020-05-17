<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php

if(isset($_GET['delete_comment'])) {

    $comment_id = $_GET['delete_comment'];

    $query_delete_comments = query("DELETE FROM comments WHERE comment_id='$comment_id'");
    confirm($query_delete_comments);

    if($query_delete_comments) {

        echo "<script>alert('One Comment has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_comments','_self')</script>";
    }
}

?>


<?php } ?>