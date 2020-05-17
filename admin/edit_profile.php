<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<?php

if(isset($_GET['edit_profile'])) {

    $admin_id = $_GET['edit_profile'];

    $query_select_admin = query("SELECT * FROM admin WHERE admin_id='$admin_id'");
    confirm($query_select_admin);
    $row = fetch_array($query_select_admin);
    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_contact = $row['admin_contact'];
    $admin_image = $row['admin_image'];
    $admin_country = $row['admin_country'];
    $admin_job = $row['admin_job'];
    $admin_about = $row['admin_about'];
}

?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li>
<i class="fa fa-tachometer-alt"></i> Dashboard / Edit Profile
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> Edit Profile
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3 control-label"> User Name: </label>
<div class="col-md-6">
<input type="text" name="admin_name" value="<?php echo $admin_name; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Email: </label>
<div class="col-md-6">
<input type="text" name="admin_email" value="<?php echo $admin_email; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Contact: </label>
<div class="col-md-6">
<input type="text" name="admin_contact" value="<?php echo $admin_contact; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Image: </label>
<div class="col-md-6">
<input type="file" name="admin_image" class="form-control"><br>
<img src="assets/img/customer_images/<?php echo $admin_image; ?>" width="70" height="70" alt="">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Country: </label>
<div class="col-md-6">
<input type="text" name="admin_country" value="<?php echo $admin_country; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Job: </label>
<div class="col-md-6">
<input type="text" name="admin_job" value="<?php echo $admin_job; ?>" class="form-control" required>
</div>
</div>

<div class="form-group">
<label  class="col-md-3 control-label"> User About: </label>
<div class="col-md-6">
<textarea name="admin_about"  cols="30" rows="3"><?php echo $admin_about; ?></textarea>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="update_user" value="Edit Profile" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['update_user'])) {

    $admin_name = escape_string($_POST['admin_name']);
    $admin_email = escape_string($_POST['admin_email']);
    $admin_contact = escape_string($_POST['admin_contact']);
    $admin_image = escape_string($_FILES['admin_image']['name']);
    $temp_image = escape_string($_FILES['admin_image']['tmp_name']);
    $admin_country = escape_string($_POST['admin_country']);
    $admin_job = escape_string($_POST['admin_job']);
    $admin_about = escape_string($_POST['admin_about']);

    move_uploaded_file($temp_image,"assets/img/customer_images/$admin_image");

    $query_update_admin = query("UPDATE admin SET admin_name='{$admin_name}',admin_email='{$admin_email}',admin_contact='{$admin_contact}',
    admin_image='{$admin_image}',admin_country='{$admin_country}',admin_job='{$admin_job}',admin_about='{$admin_about}' WHERE admin_id='{$admin_id}'");
    confirm($query_update_admin);

    if($query_update_admin) {

        echo "<script>alert('User has been updated successfully,please Login again')</script>";
        echo "<script>window.open('login.php','_self')</script>";

        session_destroy();
    }
}




?>









<?php } ?>