<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

<?php 

if(isset($_GET['edit_term'])) {

    $term_id = $_GET['edit_term'];

    $query_terms = query("SELECT * FROM terms WHERE term_id='$term_id'");
    confirm($query_terms);
    $row = fetch_array($query_terms);
    $term_id = $row['term_id'];
    $term_title = $row['term_title'];
    $term_link = $row['term_link'];
    $term_description = $row['term_description'];
}

?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Term
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> Edit Term
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-md-3 control-label"> Term Title: </label>
<div class="col-md-6">
<input type="text" name="term_title" value="<?php echo $term_title; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> Term Link: </label>
<div class="col-md-6">
<input type="text" name="term_link" value="<?php echo $term_link; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-md-3 control-label"> Term Description: </label>
<div class="col-md-6">
<textarea name="term_description" class="form-control"  cols="20" rows="3"><?php echo $term_description; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="update_term" value="Update Term" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['update_term'])) {

    $term_title = escape_string($_POST['term_title']);
    $term_link = escape_string($_POST['term_link']);
    $term_description = escape_string($_POST['term_description']);

$query_update_terms = query("UPDATE terms SET term_title='{$term_title}',term_link='{$term_link}',term_description='{$term_description}'
WHERE term_id='{$term_id}'");
confirm($query_update_terms);

if($query_update_terms) {

    echo "<script>alert('Your Term has been updated successfully')</script>";
    echo "<script>window.open('index.php?view_terms','_self')</script>";
 }

  }


?>





<?php } ?>