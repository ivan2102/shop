<?php require_once("../config.php"); ?>

<?php
if(!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";

}else {



?>

<?php
$admin_session = $_SESSION['admin_email'];

$query_admin = query("SELECT * FROM admin WHERE admin_email='$admin_session'");
confirm($query_admin);

$row = fetch_array($query_admin);
$admin_id = $row['admin_id'];
$admin_name= $row['admin_name'];
$admin_email = $row['admin_email'];
$admin_contact = $row['admin_contact'];
$admin_image = $row['admin_image'];
$admin_country = $row['admin_country'];
$admin_job = $row['admin_job'];
$admin_about = $row['admin_about'];

$query_products = query("SELECT * FROM products");
confirm($query_products);
$count_products = mysqli_num_rows($query_products);

$query_customers = query("SELECT * FROM customers");
confirm($query_customers);
$count_customers = mysqli_num_rows($query_customers);

$query_payments = query("SELECT * FROM payments");
confirm($query_payments);
$count_payments = mysqli_num_rows($query_payments);

$query_pending_orders = query("SELECT * FROM pending_orders");
confirm($query_pending_orders);
$count_pending_orders = mysqli_num_rows($query_pending_orders);
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Area</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
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
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://kit.fontawesome.com/ec5c5e6480.js" crossorigin="anonymous"></script> 
    </head>
    <body>
      <div id="wrapper">
      <?php require_once("includes/nav.php"); ?>
      <div id="page-wrapper">
      <div class="container-fluid">
      <?php 
      
      if(isset($_GET['dashboard'])) {

        require_once("dashboard.php");
      }

      if(isset($_GET['add_product'])) {

        require_once('add_product.php');
      }

      if(isset($_GET['view_products'])) {

        require_once('view_products.php');
      }

      if(isset($_GET['delete_product'])) {

        require_once('delete_product.php');
      }

      if(isset($_GET['edit_product'])) {

        require_once('edit_product.php');
      }

      if(isset($_GET['view_customers'])) {

        require_once('view_customers.php');
      }

      if(isset($_GET['delete_customer'])) {

        require_once('delete_customet.php');
      }

      if(isset($_GET['view_orders'])) {

        require_once('view_orders.php');
      }

      if(isset($_GET['delete_order'])) {

        require_once('delete_order.php');
      }

      if(isset($_GET['view_payments'])) {

        require_once('view_payments.php');
      }

      if(isset($_GET['delete_payment'])) {

        require_once('delete_payment.php');
      }

      if(isset($_GET['add_user'])) {

        require_once('add_user.php');
      }

      if(isset($_GET['view_users'])) {

        require_once('view_users.php');
      }

      if(isset($_GET['delete_user'])) {

        require_once('delete_user.php');
      }

      if(isset($_GET['edit_profile'])) {

        require_once('edit_profile.php');
      }

      if(isset($_GET['add_term'])) {

        require_once('add_term.php');
      }

      if(isset($_GET['view_terms'])) {

        require_once('view_terms.php');
      }

      if(isset($_GET['delete_term'])) {

        require_once('delete_term.php');
      }

      if(isset($_GET['edit_term'])) {

        require_once('edit_term.php');
      }

      if(isset($_GET['add_comment'])) {

        require_once('add_comment.php');
      }

      if(isset($_GET['view_comments'])) {

        require_once('view_comments.php');
      }

      if(isset($_GET['delete_comment'])) {

        require_once('delete_comment.php');
      }
      
      
      ?>
      </div>
      </div>
      </div>




<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.meanmenu.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

    <?php } ?>