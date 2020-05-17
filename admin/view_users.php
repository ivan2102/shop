<?php

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li>
<i class="fa fa-tachometer-alt"></i> Dashboard / View Users
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> View Users
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead class="bg-info">
<tr>
<th>User No</th>
<th>User Name</th>
<th>User Email</th>
<th>User Contact</th>
<th>User Image</th>
<th>User Country</th>
<th>User Job</th>
<th>User About</th>
<th>Delete User</th>
</tr>
</thead>

<tbody>
<?php
$i = 0;

$query_select_admin = query("SELECT * FROM admin");
confirm($query_select_admin);
while($row = fetch_array($query_select_admin)) {

    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_contact = $row['admin_contact'];
    $admin_image = $row['admin_image'];
    $admin_country = $row['admin_country'];
    $admin_job = $row['admin_job'];
    $admin_about = $row['admin_about'];

    $i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $admin_name; ?></td>
<td bgcolor="pink"><?php echo $admin_email; ?></td>
<td><?php echo $admin_contact; ?></td>
<td>
<img src="assets/img/customer_images/<?php echo $admin_image; ?>" width="60" height="60" alt="">
</td>
<td><?php echo $admin_country; ?></td>
<td><?php echo $admin_job; ?></td>
<td><?php echo $admin_about; ?></td>
<td>
<a href="index.php?delete_user=<?php echo $admin_id; ?>" class="btn btn-danger btn-lg">
<i class="fa fa-trash"></i>
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