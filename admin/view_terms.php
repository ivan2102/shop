<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>


<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / View Terms
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> View Terms
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">

<?php 


$query_terms = query("SELECT * FROM terms");
confirm($query_terms);
while($row = fetch_array($query_terms)) {

    $term_id = $row['term_id'];
    $term_title = $row['term_title'];
    $term_link = $row['term_link'];
    $term_description = substr($row['term_description'],0,400);

   
?>
<div class="col-lg-4 col-md-4">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title" align="center">
<?php echo $term_title; ?>
</h3>
</div><!--panel-heading Ends -->
<div class="panel-body">
<?php echo $term_description; ?>
</div><!--panel-body Ends -->

<div class="panel-footer">
<a href="index.php?delete_term=<?php echo $term_id; ?>" class="btn btn-danger btn-lg pull-right">
<i class="fa fa-trash"></i>
</a>
<a href="index.php?edit_term=<?php echo $term_id; ?>" class="btn btn-info btn-lg pull-left">
<i class="fa fa-pencil-alt"></i>
</a>
<div class="clearfix"></div>
</div>
</div>
</div>

<?php } ?>


</div>
</div>
</div>
</div>

<?php } ?>