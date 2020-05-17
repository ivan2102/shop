<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li>
<i class="fa fa-tachometer-alt"></i> Dashboard / Add Term
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> Add Term
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3 control-label"> Term Title: </label>
<div class="col-md-6">
<input type="text" name="term_title" class="form-control" required>
</div>
</div>


<div class="form-group">
<label class="col-md-3 control-label"> Term Link: </label>
<div class="col-md-6">
<input type="text" name="term_link" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> Term Description: </label>
<div class="col-md-6">
<textarea name="term_description" class="form-control" cols="20" rows="6"></textarea>
</div>
</div>

<div class="form-group">
<label  class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="add_term" value="Add Term" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['add_term'])) {

    $term_title = escape_string($_POST['term_title']);
    $term_link = escape_string($_POST['term_link']);
    $term_description = escape_string($_POST['term_description']);

    $query_insert_term = query("INSERT INTO terms(term_title,term_link,term_description)
    VALUES('{$term_title}','{$term_link}','{$term_description}')");
    confirm($query_insert_term);

    if($query_insert_term) {

        echo "<script>alert('New Term added successfully')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";

     }

 }


?>




<?php } ?>