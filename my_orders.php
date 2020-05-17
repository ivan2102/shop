<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>

<?php 

if(isset($_GET['customer_id'])) {

    $customer_id = $_GET['customer_id'];
}

$ip_address = getRealUserIp();
$order_status = 'pending';
$invoice_number = mt_rand();

$query_cart = query("SELECT * FROM cart WHERE ip_address='{$ip_address}'");
confirm($query_cart);

while($row = fetch_array($query_cart)) {

    $product_id = $row['product_id'];
    $product_quantity = $row['product_quantity'];
    $product_size = $row['product_size'];

    $query_products = query("SELECT * FROM products WHERE product_id='{$product_id}'");
    confirm($query_products);

    while($row = fetch_array($query_products)) {

        $sub_total = $row['product_price'] * $product_quantity;

        $query_insert_customer_orders = query("INSERT INTO customer_orders(customer_id,due_amount,invoice_number,product_quantity,product_size,order_date,order_status)
        VALUES('{$customer_id}','{$sub_total}','{$invoice_number}','{$product_quantity}','{$product_size}',NOW(),'{$order_status}')");
        confirm($query_insert_customer_orders);

        $query_insert_pending_orders = query("INSERT INTO pending_orders(customer_id,invoice_number,product_id,product_quantity,product_size,order_status)
        VALUES('{$customer_id}','{$invoice_number}','{$product_id}','{$product_quantity}','{$product_size}','{$order_status}')");
        confirm($query_insert_pending_orders);

        $query_delete_cart = query("DELETE FROM cart WHERE ip_address='$ip_address'");
        confirm($query_delete_cart);

        echo "<script>alert('Your Order has been submitted successfully')</script>";
        echo "<script>window.open('my_orders.php','_self')</script>";
    }
}


?>
<!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">My Orders</h2>
<ul>
<li><a href="index.php">home</a></li>
<li><a href="shop.php">shop</a></li>
<li class="active">my orders</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->

<div class="cart-main-area ptb-100 wishlist">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h1 class="cart-heading">my orders</h1>
<form action="#">
<!--<hr>-->
<div class="table-content table-responsive">
<table>
<thead>
<tr>
<th>ID</th>
<th>Due Amount</th>
<th>Invoice No</th>
<th>Product Quantity</th>
<th>Product Size</th>
<th>Order Date</th>
<th>Paid/Unpaid</th>
<th>Order Status</th>
</tr>
</thead>

<tbody>
<?php 

$customer_session = $_SESSION['customer_email'];

$query_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
confirm($query_customers);
$row = fetch_array($query_customers);
$customer_id = $row['customer_id'];

$query_customer_orders = query("SELECT * FROM customer_orders WHERE customer_id='{$customer_id}'");
confirm($query_customer_orders);

$i = 0;

while($row = fetch_array($query_customer_orders)) {

$order_id = $row['order_id'];
$due_amount = $row['due_amount'];
$invoice_number = $row['invoice_number'];
$product_quantity = $row['product_quantity'];
$product_size = $row['product_size'];
$order_date = $row['order_date'];
$order_status = $row['order_status'];

$i++;

if($order_status == 'pending') {

 $order_status = 'Unpaid';

}else {

$order_status = 'Paid';
 }




?>
<tr>
<td><?php echo $i; ?></td>
<td>$<?php echo $due_amount; ?></td>
<td><?php echo $invoice_number; ?></td>
<td><?php echo $product_quantity; ?></td>
<td><?php echo $product_size; ?></td>
<td><?php echo $order_date; ?></td>
<td><?php echo $order_status; ?></td>
<td>
<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary">
Confirm If Paid
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
</form>




<br>
<br>
<br>
<br>
<br>













<?php require_once("includes/footer.php"); ?>