<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php

if(isset($_GET['approve'])) {

    $comment_id = $_GET['approve'];

    $query_approve_comments = query("UPDATE comments SET comment_status='approved' WHERE comment_id='$comment_id'");
    confirm($query_approve_comments);
}

if(isset($_GET['unapprove'])) {

    $comment_id = $_GET['unapprove'];

    $query_unapprove_comments = query("UPDATE comments SET comment_status='unapproved' WHERE comment_id='$comment_id'");
    confirm($query_unapprove_comments);
}


?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li class="active">
<i class="fa fa-tachometer-alt"></i> Dashboard / View Comments
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-fw fa-money"></i> View Comments
</h3>
</div><!--panel-heading Ends -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead class="bg-info">
<tr>
<th>Comment No</th>
<th>Comment Author</th>
<th>Comment Email</th>
<th>Comment Date</th>
<th>Comment Content</th>
<th>Comment Status</th>
<th>Approve</th>
<th>Unapprove</th>
<th>Delete Comment</th>
<th>Edit Comment</th>
</tr>
</thead>

<tbody>

<?php 
$i = 0;

$query_comments = query("SELECT * FROM comments");
confirm($query_comments);
while($row = fetch_array($query_comments)) {

    $comment_id = $row['comment_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_status = $row['comment_status'];

    $i++;


?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $comment_author; ?></td>
<td bgcolor="pink"><?php echo $comment_email; ?></td>
<td><?php echo $comment_date; ?></td>
<td><?php echo $comment_content; ?></td>
<td><?php echo $comment_status; ?></td>


<td>
<a href="index.php?view_comments&approve=<?php echo $comment_id; ?>">Approve</a>
</td>

<td>
<a href="index.php?view_comments&unapprove=<?php echo $comment_id; ?>">Unapprove</a>
</td>
<td>
<a href="index.php?delete_comment=<?php echo $comment_id; ?>" class="btn btn-danger btn-lg">
<i class="fa fa-trash"></i>
</a>
</td>
<td>
<a href="index.php?edit_comment=<?php echo $comment_id; ?>" class="btn btn-info btn-lg">
<i class="fa fa-pencil-alt"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<?php } ?>