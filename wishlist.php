<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>





<?php 

$customer_session = $_SESSION['customer_email'];

$query_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
confirm($query_customers);

$row = fetch_array($query_customers);
$customer_id = $row['customer_id'];

if(isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $query_insert_into_wishlist = query("INSERT INTO wishlist(customer_id,product_id,added_on)
    VALUES('{$customer_id}','{$product_id}',NOW())");
    confirm($query_insert_into_wishlist);

    if($query_insert_into_wishlist) {

        echo "<script>alert('Your Wishlist added successfully')</script>";
        echo "<script>window.open('wishlist.php','_self')</script>";
    }
}



?>
                    
<!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">wishlist</h2>
<ul>
<li><a href="index.php">home</a></li>
<li><a href="shop.php">shop</a></li>
<li class="active">wishlist</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->
<!-- shopping-cart-area start -->
<div class="cart-main-area ptb-100 wishlist">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h1 class="cart-heading">wishlist</h1>
<form action="#">
<div class="table-content table-responsive">
<table>
<thead>
<tr>
<th>Wishlist ID</th>
<th>Customer ID</th>
<th>Product ID</th>
<th>Added On</th>
<th>Image</th>
<th>Title</th>
<th>Price</th>
<th>remove</th>
</tr>
</thead>
<tbody>
<?php 
$i = 0;

$query_wishlist = query("SELECT * FROM wishlist");
confirm($query_wishlist);
while($row = fetch_array($query_wishlist)) {

    $wishlist_id = $row['wishlist_id'];
    $customer_id = $row['customer_id'];
    $product_id = $row['product_id'];
    $added_on = $row['added_on'];
    $i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $customer_id; ?></td>
<td><?php echo $product_id; ?></td>
<td><?php echo $added_on; ?></td>

<td class="product-thumbnail">
<?php 

$query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
confirm($query_products);
$row = fetch_array($query_products);
$product_id = $row['product_id'];
$product_image = $row['product_image'];
$product_title = $row['product_title'];
$product_price = $row['product_price'];


?>
<a href="#"><img src="assets/img/product-images/<?php echo $product_image; ?>" width="70" height="70" alt=""></a>
</td>
<td class="product-name"><a href="#"><?php echo $product_title; ?></a></td>
<td class="product-price"><span class="amount">$<?php echo $product_price; ?></span></td>
<td class="product-remove"><a href="delete_wishlist.php?wishlist_id=<?php echo $wishlist_id; ?>"><i class="fa fa-times"></i></a></td>
</tr>
<?php }?>
</tbody>
</table>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- shopping-cart-area end -->

<?php require_once("includes/footer.php"); ?>        
        
        
        
        
        
        

