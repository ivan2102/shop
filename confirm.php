<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>

<?php

if(isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
}

?>


<!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">confirm</h2>
<ul>
<li><a href="index.php">home</a></li>
<li><a href="shop.php">shop</a></li>
<li class="active">confirm</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->

<div class="cart-main-area ptb-100 confirm">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h1 class="cart-heading">confirm</h1>
<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
<div class="form-group">
<label for="">Invoice No: </label>
<input type="text" name="invoice_no" class="form-control" required>
</div>

<div class="form-group">
<label for="">Amount Sent: </label>
<input type="text" name="amount_sent" class="form-control" required>
</div>

<div class="form-group">
<label for="">Select Payment Mode: </label>
<select name="payment_mode" id="payment_mode" class="form-control" required>
<option>Select Payment Mode</option>
<option>Credit Card</option>
<option>Debit Card</option>
<option>Visa Master Card</option>
<option>Western Union</option>
<option>Pay Pal Account</option>
</select>
</div>

<div class="form-group">
<label for="">Transaction/Reference ID: </label>
<input type="text" name="transaction" class="form-control" required>
</div>

<div class="form-group">
<label for="">Omni Code: </label>
<input type="text" name="omni_code" class="form-control" required>
</div>

<div class="form-group">
<label for="">Payment Date: </label>
<input type="text" name="payment_date" class="form-control" required>
</div>

<div class="text-center">
<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
<i class="fas fa-user"></i> Confirm Payment
</button>
</div>

</form>
</div>
</div>
</div>

</div>
<?php

if(isset($_POST['confirm_payment'])) {

    $update_id = $_GET['update_id'];
    $invoice_no = escape_string($_POST['invoice_no']);
    $amount_sent = escape_string($_POST['amount_sent']);
    $payment_mode = escape_string($_POST['payment_mode']);
    $transaction = escape_string($_POST['transaction']);
    $omni_code = escape_string($_POST['omni_code']);
    $payment_date = escape_string($_POST['payment_date']);

    $complete = "Complete";

    $query_insert_payment = query("INSERT INTO payments(invoice_no,amount_sent,payment_mode,transaction,omni_code,payment_date)
    VALUES('{$invoice_no}','{$amount_sent}','{$payment_mode}','{$transaction}','{$omni_code}','{$payment_date}')");
    confirm($query_insert_payment);

    $query_update_customer_orders = query("UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'");
    confirm($query_update_customer_orders);

    $query_update_pending_orders = query("UPDATE pending_orders SET order_status='$complete' WHERE order_id='$update_id'");
    confirm($query_update_pending_orders);

    if($query_update_pending_orders) {

        echo "<script>alert('Your Payment has been received,order will be completed within 24 hours')</script>";
        echo "<script>window.open('my_orders.php','_self')</script>";
    }
}




?>










<?php require_once("includes/footer.php"); ?>