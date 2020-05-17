<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
 <?php require_once("includes/nav.php"); ?>            
            <!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">cart page</h2>
<ul>
<li><a href="index.php">home</a></li>
<li><a href="shop.php">shop</a></li>
<li class="active">cart</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->
<!-- shopping-cart-area start -->
<div class="cart-main-area ptb-100">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h1 class="cart-heading">Cart</h1>
<form action="cart.php" method="post" enctype="multipart/form-data">
<div class="table-content table-responsive">
<table>
<thead>
<tr>
<th class="product-name">remove</th>
<th class="product-price">images</th>
<th class="product-name">Product</th>
<th class="product-price">Price</th>
<th class="product-quantity">Quantity</th>
<th class="product-subtotal">Total</th>
</tr>
</thead>
<tbody>
<?php 
$total = 0;

$ip_address = getRealUserIp();

$query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
confirm($query_cart);

while($row = fetch_array($query_cart)) {

    $product_id = $row['product_id'];
    $product_quantity = $row['product_quantity'];
    $product_size = $row['product_size'];

    $query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
    confirm($query_products);

    while($row = fetch_array($query_products)) {

        $product_title = $row['product_title'];
        $product_image = $row['product_image'];
        $product_price = $row['product_price'];
        $sub_total = $row['product_price'] * $product_quantity;
        $total += $sub_total;
    



?>
<tr>
<td class="product-remove"><a href="delete_product.php?product_id=<?php echo $product_id; ?>"><i class="fa fa-times"></i></a></td>
<td class="product-thumbnail">
    <a href="#"><img src="assets/img/product-images/<?php echo $product_image; ?>" width="70" height="70" alt=""></a>
</td>
<td class="product-name"><a href="#"><?php echo $product_title; ?></a></td>
<td class="product-price"><span class="amount">$<?php echo $product_price; ?></span></td>
<td class="product-quantity">
    <input value="<?php echo $product_quantity; ?>" type="number">
</td>
<td class="product-subtotal">$<?php echo $sub_total; ?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="coupon-all">
<div class="coupon">
<input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
<input class="button" name="apply_coupon" value="Apply coupon" type="submit">
</div>

<div class="coupon2">
<input class="button" name="update_cart" value="Update cart" type="submit">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-5 col-md-offset-7 col-sm-12 col-xs-12">
<div class="cart-total">
<h2>Cart totals</h2>
<ul>
<li>Subtotal<span><?php echo $sub_total ?></span></li>
<li>Total<span><?php echo $total; ?></span></li>
</ul>

<a href="checkout.php">Proceed to checkout</a>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- shopping-cart-area end -->

<?php 
if(isset($_POST['apply_coupon'])) {

    $coupon_code = $_POST['coupon_code'];

    if($coupon_code == "") {

    }
    else {

      $query_coupons = query("SELECT * FROM coupons WHERE coupon_code='$coupon_code'");
      confirm($query_coupons);

      $check_coupons = mysqli_num_rows($query_coupons);

      if($check_coupons == 1) {
         
        $row = fetch_array($query_coupons);

        $product_id = $row['product_id'];
        $coupon_price = $row['coupon_price'];
        $coupon_limit = $row['coupon_limit'];
        $coupon_used = $row['coupon_used'];

        if($coupon_limit == $coupon_used) {

            echo "<script>alert('Your Coupon Code Has Been Expired')</script>";

        }
        else {
            
            $query_cart = query("SELECT * FROM cart WHERE product_id='$product_id' AND ip_address='$ip_address'");
            confirm($query_cart);
            $check_cart = mysqli_num_rows($query_cart);

            if($check_cart == 1) {

                $query_update_coupons = query("UPDATE coupons SET coupon_used=coupon_used + 1 WHERE coupon_code='$coupon_code'");
                confirm($query_update_coupons);

                $query_update_cart = query("UPDATE cart SET $row[product_price]='$coupon_price' WHERE product_id='$product_id'
                AND ip_address='$ip_address'");
                confirm($query_update_cart);

                echo "<script>alert('Your Coupon Code Has Been Applied')</script>";
                echo "<script>window.open('cart.php','_self')</script>";
            }
            else {

                echo "<script>alert('Product Doesn't Exist In Cart')</script>";
            }

        }
      }
      else {

        echo "<script>alert('Your Coupon Code Is Not Valid')</script>";
      }
    }

    
}





?>


<?php require_once("includes/footer.php"); ?>













