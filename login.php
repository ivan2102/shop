<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>        
<!-- breadcrumb start -->

            <?php 
            
            if(isset($_POST['login'])) {

                $customer_email = escape_string($_POST['customer_email']);
                $customer_password = md5($_POST['customer_password']);

                $query_customers = query("SELECT * FROM customers WHERE customer_email='{$customer_email}'
                AND customer_password='{$customer_password}'");
                confirm($query_customers);

                $get_ip = getRealUserIp();

                $check_customer = mysqli_num_rows($query_customers);

                $query_cart = query("SELECT * FROM cart WHERE ip_address='$get_ip'");
                confirm($query_cart);

                $check_cart = mysqli_num_rows($query_cart);

                if($check_customer == 0) {

                    echo "<script>alert('Email or Password are wrong.Please try again later!?')</script>";
                    exit();
                }
                if($check_customer == 1 && $check_cart == 0) {

                   
                    $_SESSION['customer_email'] = $customer_email;

                    echo "<script>alert('You are Logged In')</script>";
                    echo "<script>window.open('my_orders.php','_self')</script>";

                }else {

                    $_SESSION['customer_email'] = $customer_email;

                    echo "<script>alert('You are Logged In')</script>";
                    echo "<script>window.open('checkout.php','_self')</script>";
                }
            }
            
            
            
            
            
            
            
            ?>
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">login page</h2>
<ul>
<li><a href="#">home</a></li>
<li class="active">login</li>
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
<h2>login</h2>
<span>Please login using account detail bellow.</span>
</div>
<div class="login-form">
<form action="#" method="post">
<input type="text" name="customer_email" placeholder="Email">
<input type="password" name="customer_password" placeholder="Password">
<div class="button-box">
    <div class="login-toggle-btn">
        <input type="checkbox">
        <label for="remember">Remember me</label>
        <a href="#">Forgot Password?</a>
    </div>
    <button type="submit" name="login" class="default-btn floatright">Login</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php require_once("includes/footer.php"); ?>
        
        
        
        
        
        
        
        
        
        
        


