<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li>
<i class="fa fa-tachometer-alt"></i> Dashboard / View Orders
</li>
</ol>
</div>
</div><!--1row Ends -->

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> View Orders
</h3>
</div><!--panel-heading Ends -->

<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead class="bg-info">
<tr>
<th>Order No</th>
<th>Customer Email</th>
<th>Invoice No</th>
<th>Product Title</th>
<th>Product Quantity</th>
<th>Product Size</th>
<th>Order Date</th>
<th>Total Amount</th>
<th>Order Status</th>
<th>Delete Order</th>
</tr>
</thead>

<tbody>

<?php 
$i = 0;

$query_pending_orders = query("SELECT * FROM pending_orders");
confirm($query_pending_orders);
while($row = fetch_array($query_pending_orders)) {
$order_id = $row['order_id'];
$customer_id = $row['customer_id'];
$invoice_number = $row['invoice_number'];
$product_id = $row['product_id'];
$product_quantity = $row['product_quantity'];
$product_size = $row['product_size'];
$order_status = $row['order_status'];

$i++;


?>
<tr>
<td><?php echo $i; ?></td>
<td>
<?php 
$query_customers = query("SELECT * FROM customers WHERE customer_id='$customer_id'");
confirm($query_customers);
$row = fetch_array($query_customers);
$customer_email = $row['customer_email'];
echo $customer_email;
?>
</td>
<td bgcolor="lightgreen"><?php echo $invoice_number; ?></td>
<td>
<?php 
$query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
confirm($query_products);
$row = fetch_array($query_products);
$product_title = $row['product_title'];
echo $product_title;
?>
</td>
<td><?php echo $product_quantity; ?></td>
<td><?php echo $product_size; ?></td>
<td>
<?php
$query_customer_orders = query("SELECT * FROM customer_orders WHERE order_id='$order_id'");
confirm($query_customer_orders);
$row = fetch_array($query_customer_orders);
$order_date = $row['order_date'];
$due_amount = $row['due_amount'];
echo $order_date;
?>
</td>
<td>$<?php echo $due_amount; ?></td>
<td><?php 
if($order_status == 'pending') {

   echo $order_status = 'pending';
}else {

   echo $order_status = 'Complete';
}
?>
</td>
<td>
<a href="index.php?delete_order=<?php echo $order_id; ?>" class="btn btn-danger btn-lg">
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