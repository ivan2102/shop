<?php require_once("../config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <link rel="stylesheet" href="assets/css/shortcodes/shortcode.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://kit.fontawesome.com/ec5c5e6480.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" name="admin_email" class="form-control" placeholder="Email Address" required>
            <input type="password" name="admin_password" class="form-control" placeholder="Password" required>
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Login</button>
        </form>
    </div>
    
</body>
</html>

<?php
if(isset($_POST['submit'])) {

    $admin_email = escape_string($_POST['admin_email']);
    $admin_password = md5($_POST['admin_password']);

   $query_select_admin = query("SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'");
   confirm($query_select_admin);

   $count = mysqli_num_rows($query_select_admin);

    if($count == 1) {

        $_SESSION['admin_email'] = $admin_email;
        
        echo "<script>alert('You are Logged In into Admin Panel')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";

    }else {

        echo "<script>alert('Email or Password are wrong')</script>";
    }
}

?>