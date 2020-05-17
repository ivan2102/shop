<?php require_once("config.php"); ?>
<?php require_once("includes/header.php");?>
<?php require_once("includes/nav.php"); ?>                    
<!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">register page</h2>
<ul>
<li><a href="#">home</a></li>
<li class="active">register</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->
<!-- register-area start -->
<div class="register-area ptb-100">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 col-lg-4 col-lg-offset-4">
<div class="login">
<div class="login-form-container">
<div class="login-text">
<h2>Register</h2>
<span>Please Register using account detail bellow.</span>
</div>
<div class="login-form">
<form action="#" method="post">
<input type="text" name="user_name" placeholder="Username">
<input name="user_email" placeholder="Email" type="email">
<input type="password" name="password" placeholder="Password">
<div class="button-box">
    <button type="submit" name="register" class="default-btn floatright">Register</button>
</div>
</form>

<?php 
if(isset($_POST['register'])) {

    $user_name = escape_string($_POST['user_name']);
    $password = md5($_POST['password']);
    $user_email = escape_string($_POST['user_email']);

    $query_insert_users = query("INSERT INTO users(user_name,password,user_email)VALUES('{$user_name}','{$password}','{$user_email}')");
    confirm($query_insert_users);

    if($query_insert_users) {

        $_SESSION['customer'] = $user_email;

        echo "<script>alert('User registred successfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }else {

        echo "<script>alert('Your Credentials are wrong,please try again')</script>";
        echo "<script>window.open('login.php','_self')</script>";

    }

}

?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- register-area end -->
<?php require_once("includes/footer.php"); ?>