<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / Add Comment
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-fw fa-money"></i> Add Comment
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-md-3 control-label"> Comment Author: </label>
<div class="col-md-6">
<input type="text" name="comment_author" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> Comment Email: </label>
<div class="col-md-6">
<input type="text" name="comment_email" class="form-control" required>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"> Comment Content: </label>
<div class="col-md-6">
<textarea name="comment_content" class="form-control" cols="20" rows="3"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> Comment Date: </label>
<div class="col-md-6">
<input type="date" name="comment_date" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-md-3 contorl-label"></label>
<div class="col-md-6">
<input type="submit" name="add_comment" value="Add Comment" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['add_comment'])) {

    $comment_author = escape_string($_POST['comment_author']);
    $comment_email = escape_string($_POST['comment_email']);
    $comment_content = escape_string($_POST['comment_content']);
    $comment_date = escape_string($_POST['comment_date']);

    $query_insert_comment = query("INSERT INTO comments(comment_author,comment_email,comment_content,comment_date)
    VALUES('{$comment_author}','{$comment_email}','{$comment_content}',NOW())");

    if($query_insert_comment) {

        echo "<script>alert('One Comment inserted successfully')</script>";
        echo "<script>window.open('index.php?view_comments','_self')</script>";
    }
}

?>

<?php } ?>