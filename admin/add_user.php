<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>


<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li>
<i class="fa fa-tachometer-alt"></i> Dashboard / Add User
</li>
</ol>
</div>
</div><!--1 row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> Add User
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-md-3 control-label"> User Name: </label>
<div class="col-md-6">
<input type="text" name="admin_name" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Email: </label>
<div class="col-md-6">
<input type="text" name="admin_email" class="form-control" required>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"> User Password: </label>
<div class="col-md-6">
<input type="password" name="admin_password" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Contact: </label>
<div class="col-md-6">
<input type="text" name="admin_contact" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label"> User Image: </label>
<div class="col-md-6">
<input type="file" name="admin_image" class="form-control">
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"> User Country: </label>
<div class="col-md-6">
<input type="text" name="admin_country" class="form-control" requied>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"> User Job: </label>
<div class="col-md-6">
<input type="text" name="admin_job" class="form-control" required>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"> User About: </label>
<div class="col-md-6">
<textarea name="admin_about" id="" cols="3" rows=""></textarea>
</div>
</div>

<div class="form-group">
<label for="" class="col-md-3 control-label"></label>
<div class="col-md-6">
<input type="submit" name="add_user" value="Add User" class="btn btn-primary form-control">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['add_user'])) {

    $admin_name = escape_string($_POST['admin_name']);
    $admin_email = escape_string($_POST['admin_email']);
    $admin_password = md5($_POST['admin_password']);
    $admin_contact = escape_string($_POST['admin_contact']);
    $admin_image = escape_string($_FILES['admin_image']['name']);
    $temp_image = escape_string($_FILES['admin_image']['tmp_name']);
    $admin_country = escape_string($_POST['admin_country']);
    $admin_job = escape_string($_POST['admin_job']);
    $admin_about = escape_string($_POST['admin_about']);

    move_uploaded_file($temp_image,"assets/img/customer_images/$admin_image");

    $query_insert_admin_user = query("INSERT INTO admin(admin_name,admin_email,admin_password,admin_contact,admin_image,admin_country,admin_job,admin_about)
    VALUES('{$admin_name}','{$admin_email}','{$admin_password}','{$admin_contact}','{$admin_image}','{$admin_country}','{$admin_job}','{$admin_about}')");
    confirm($query_insert_admin_user);

    if($query_insert_admin_user) {

        echo "<script>alert('New Admin User inserted successfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}




?>











<?php } ?>