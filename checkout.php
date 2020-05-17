<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>         
<!-- breadcrumb start -->

<?php 

$customer_session = $_SESSION['customer_email'];

if(isset($_POST['submit'])) {
    if($_POST['agree'] == true) {

       $customer_name = escape_string($_POST['customer_name']);
       $customer_email = escape_string($_POST['customer_email']);
       $customer_password = md5($_POST['customer_password']);
       $company = escape_string($_POST['company']);
       $address = escape_string($_POST['address']);
       $city = escape_string($_POST['city']);
       $country = escape_string($_POST['country']);
       $zip = escape_string($_POST['zip']);
       $phone = escape_string($_POST['phone']);

       $query_select_customers = query("SELECT * FROM customers WHERE customer_email='$customer_session'");
       confirm($query_select_customers);
       $row = fetch_array($query_select_customers);
       $count = mysqli_num_rows($query_select_customers);

       if($count == 1) {

        $query_update_customers = query("UPDATE customers SET customer_name='{$customer_name}',customer_email='{$customer_email}',customer_password='{$customer_password}',company='{$company}',address='{$address}',
        city='{$city}',country='{$country}',zip='{$zip}',phone='{$phone}' WHERE customer_email='{$customer_email}'");
        confirm($query_update_customers);
        
        if($query_update_customers) {
        
            echo "<script>alert('Customer updated successfully')</script>";
            
        }
       }else {

       $query_insert_customers = query("INSERT INTO customers(customer_name,customer_email,customer_password,company,address,city,country,zip,phone)
       VALUES('{$customer_name}','{$customer_email}','{$customer_password}','{$company}','{$address}','{$city}','{$country}','{$zip}','{$phone}')");
       confirm($query_insert_customers);

       if($query_insert_customers) {

         echo "<script>alert('Customer inserted successfully')</script>";
         
       }

      }
    }
}



$query_select_customers = query("SELECT * FROM customers WHERE customer_email='{$customer_session}'");
confirm($query_select_customers);
$row = fetch_array($query_select_customers);
$customer_name = $row['customer_name'];
$customer_email = $row['customer_email'];
$customer_password = $row['customer_password'];
$company = $row['company'];
$address = $row['address'];
$city = $row['city'];
$country = $row['country'];
$zip = $row['zip'];
$phone = $row['phone'];


?>
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">checkout page</h2>
<ul>
<li><a href="#">home</a></li>
<li><a href="#">shop</a></li>
<li class="active">checkout</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="coupon-accordion">
<!-- ACCORDION START -->
<h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
<div id="checkout-login" class="coupon-content">
<div class="coupon-info">
<p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
<form action="#">
<p class="form-row-first">
<label>Username or email <span class="required">*</span></label>
<input type="text" />
</p>
<p class="form-row-last">
<label>Password  <span class="required">*</span></label>
<input type="text" />
</p>
<p class="form-row">					
<input type="submit" value="Login" />
<label>
<input type="checkbox" />
Remember me 
</label>
</p>
<p class="lost-password">
<a href="#">Lost your password?</a>
</p>
</form>
</div>
</div>
<!-- ACCORDION END -->	
<!-- ACCORDION START -->
<h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
<div id="checkout_coupon" class="coupon-checkout-content">
<div class="coupon-info">
<form action="#">
<p class="checkout-coupon">
<input type="text" placeholder="Coupon code" />
<input type="submit" value="Apply Coupon" />
</p>
</form>
</div>
</div>
<!-- ACCORDION END -->						
</div>
</div>
</div>
<div class="row">
<form action="checkout.php" method="post" class="form-horizontal">
<div class="col-lg-6 col-md-6">
<div class="checkbox-form">						
<h3>Billing Details</h3>
<div class="row">
<div class="col-md-12">
<div class="country-select">
<label>Country <span class="required">*</span></label>
<select name="country">
<option value="">bangladesh</option>
<option value="">Algeria</option>
<option value="">Afghanistan</option>
<option value="">Ghana</option>
<option value="">Albania</option>
<option value="">Bahrain</option>
<option value="">Colombia</option>
<option value="">Dominican Republic</option>
</select> 										
</div>
</div>
<div class="col-md-6">
<div class="checkout-form-list">
<label>Customer Name <span class="required">*</span></label>										
<input type="text" name="customer_name" value="<?php echo $customer_name; ?>" placeholder="" />
</div>
</div>

<div class="col-md-6">
<div class="checkout-form-list">
<label>Customer Email <span class="required">*</span></label>										
<input type="email" name="customer_email" value="<?php echo $customer_email; ?>" placeholder="" />
</div>
</div>

<div class="col-md-6">
<div class="checkout-form-list">
<label>Customer Password <span class="required">*</span></label>										
<input type="password" name="customer_password" value="<?php echo $customer_password; ?>" placeholder="" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">
<label>Company Name</label>
<input type="text" name="company" value="<?php echo $company; ?>" placeholder="" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">
<label>Address <span class="required">*</span></label>
<input type="text" name="address" value="<?php echo $address; ?>" placeholder="Street address" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">									
<input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">
<label>Town / City <span class="required">*</span></label>
<input type="text" name="city" value="<?php echo $city; ?>" placeholder="Town / City" />
</div>
</div>

<div class="col-md-6">
<div class="checkout-form-list">
<label>Postcode / Zip <span class="required">*</span></label>										
<input type="text" name="zip" value="<?php echo $zip; ?>" placeholder="Postcode / Zip" />
</div>
</div>

<div class="col-md-6">
<div class="checkout-form-list">
<label>Phone  <span class="required">*</span></label>										
<input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Postcode / Zip" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list create-acc">	
<input id="cbox" name="agree" value="true" type="checkbox" />
<label>Create an account?</label>
</div>
<div id="cbox_info" class="checkout-form-list create-account">
<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
<label>Account password  <span class="required">*</span></label>
<input type="password" placeholder="password" />	
</div>
</div>								
</div>
<div class="different-address">
<div class="ship-different-title">
<h3>
<label>Ship to a different address?</label>
<input id="ship-box" type="checkbox" />
</h3>
</div>
<div id="ship-box-info" class="row">
<div class="col-md-12">
<div class="country-select">
<label>Country <span class="required">*</span></label>
<select>
<option value="">bangladesh</option>
<option value="">Algeria</option>
<option value="">Afghanistan</option>
<option value="">Ghana</option>
<option value="">Albania</option>
<option value="">Bahrain</option>
<option value="">Colombia</option>
<option value="">Dominican Republic</option>
</select> 										
</div>
</div>
<div class="col-md-6">
<div class="checkout-form-list">
<label>First Name <span class="required">*</span></label>										
<input type="text" placeholder="" />
</div>
</div>
<div class="col-md-6">
<div class="checkout-form-list">
<label>Last Name <span class="required">*</span></label>										
<input type="text" placeholder="" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">
<label>Company Name</label>
<input type="text" placeholder="" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">
<label>Address <span class="required">*</span></label>
<input type="text" placeholder="Street address" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">									
<input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
</div>
</div>
<div class="col-md-12">
<div class="checkout-form-list">
<label>Town / City <span class="required">*</span></label>
<input type="text" placeholder="Town / City" />
</div>
</div>
<div class="col-md-6">
<div class="checkout-form-list">
<label>State / County <span class="required">*</span></label>										
<input type="text" placeholder="" />
</div>
</div>
<div class="col-md-6">
<div class="checkout-form-list">
<label>Postcode / Zip <span class="required">*</span></label>										
<input type="text" placeholder="Postcode / Zip" />
</div>
</div>
<div class="col-md-6">
<div class="checkout-form-list">
<label>Email Address <span class="required">*</span></label>										
<input type="email" placeholder="" />
</div>
</div>
<div class="col-md-6">
<div class="checkout-form-list">
<label>Phone  <span class="required">*</span></label>										
<input type="text" placeholder="Postcode / Zip" />
</div>
</div>								
</div>
<div class="order-notes">
<div class="checkout-form-list mrg-nn">
<label>Order Notes</label>
<textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." ></textarea>
</div>									
</div>
</div>													
</div>
</div>	
<div class="col-lg-6 col-md-6">
<div class="your-order">
<h3>Your order</h3>
<div class="your-order-table table-responsive">
<table>
<thead>
<tr>
<th class="product-name">Product</th>
<th class="product-total">Total</th>
</tr>							
</thead>
<tbody>
<tr class="cart_item">
<td class="product-name">
Vestibulum suscipit <strong class="product-quantity"> × 1</strong>
</td>
<td class="product-total">
<span class="amount">£165.00</span>
</td>
</tr>
<tr class="cart_item">
<td class="product-name">
Vestibulum dictum magna	<strong class="product-quantity"> × 1</strong>
</td>
<td class="product-total">
<span class="amount">£50.00</span>
</td>
</tr>
</tbody>
<tfoot>
<tr class="cart-subtotal">
<th>Cart Subtotal</th>
<td><span class="amount">£215.00</span></td>
</tr>
<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">£215.00</span></strong>
</td>
</tr>								
</tfoot>
</table>
</div>
<div class="payment-method">
<div class="payment-accordion">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Direct Bank Transfer
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Cheque Payment
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
PayPal
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
</div>
</div>
</div>
</div>
<div class="order-button-payment">
<input type="submit" name="submit" value="Pay Now" />
</div>								
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<?php require_once("includes/footer.php"); ?>    









        
        
        
        
        
        
        
        
        
        
        

	
