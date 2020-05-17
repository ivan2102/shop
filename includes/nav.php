<?php require_once("config.php"); ?>
<div class="col-md-6 col-lg-6 col-sm-2 col-xs-2 text-center">
<div class="main-menu display-inline">
<nav>
<ul class="menu">
<li><a href="index.php">HOME <i class="pe-7s-angle-down"></i></a></li>
<li><a href="admin/index.php?dashboard">ADMIN</a></li>
<li><a href="#">pages <i class="pe-7s-angle-down"></i></a>
<ul>
    <li><a href="my_orders.php">my orders</a></li>
    <li><a href="shop.php">shop</a></li>
    <li><a href="cart.php">cart</a></li>
    <li><a href="login.php">login</a></li>
    <li><a href="register.php">register</a></li>
    <li><a href="checkout.php">checkout</a></li>
    <li><a href="wishlist.php">wishlist</a></li>
    <li><a href="contact-us.php">contact us</a></li>
</ul>
</li>
<li><a href="shop.php">shop</a></li>
<li><a href="blog.php">BLOG <i class="pe-7s-angle-down"></i></a>
<ul>
    <li><a href="blog.php">blog 2 column</a></li>
    <li><a href="blog-details.php">blog details</a></li>
</ul>
</li>
<li><a href="contact-us.php">CONTACT</a></li>
</ul>
</nav>
</div>
</div>

<div class="col-md-3 col-lg-3 col-xs-6 col-sm-6 text-right text-sm text-res">
<div class="cart-user-language">
<div class="shopping-cart ml-30">
    <a class="top-cart" href="cart.php"><i class="pe-7s-cart"></i></a>
    <ul>
        <li>
        <?php 

        $total = 0;

        $ip_address = getRealUserIp();

        $query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
        confirm($query_cart);
        while($row = fetch_array($query_cart)) {
            $product_id = $row['product_id'];
            $product_quantity = $row['product_quantity'];
        

            $query_products = query("SELECT * FROM products WHERE product_id='$product_id'");
            confirm($query_products);
            while($row = fetch_array($query_products)) {
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];
                $sub_total = $row['product_price'] * $product_quantity;
                $total  += $sub_total;
            
        
        
        
        ?>
          
        </li>
        <li>
            <div class="cart-img">
                <a href="#"><img src="assets/img/product-images/<?php echo $product_image; ?>" width="60" height="60" alt="" /></a>
            </div>
            <div class="cart-content">
                <h3><a href="#"> <?php echo $product_title; ?></a> </h3>
                <span><b><?php echo $product_quantity; ?></b></span>
                <span class="cart-price">$<?php echo $product_price; ?></span>
            </div>
            <div class="cart-del">
                <i class="pe-7s-close-circle"></i>
            </div>
        </li>
        <li>
            <div class="shipping"> 
                <span class="f-left">Shipping </span>
                <span class="f-right cart-price"> $7.00</span>  
            </div>
            <hr class="shipping-border" />
            <div class="shipping">
                <span class="f-left"> Total </span>
                <span class="f-right cart-price">$<?php echo $total; ?></span> 
            </div>
            <?php } } ?>
        </li>
        <li class="checkout m-0"><a href="checkout.php">checkout <i class="pe-7s-angle-right"></i></a></li>
    </ul>							
</div>
<div class="user">
    <a href="#" data-toggle="modal" data-target="#loginModal"><i class="pe-7s-add-user"></i></a>
</div>
<div class="language-menu none">
    <ul>
        <li><a href="#">eng <i class="pe-7s-angle-down"></i></a>
            <ul>
                <li><a href="#">eng</a></li>
                <li><a href="#">fre</a></li>
                <li><a href="#">ger</a></li>
            </ul>
        </li>
        <li><a href="#">usd <i class="pe-7s-angle-down"></i></a>
            <ul>
                <li><a href="#">usd</a></li>
                <li><a href="#">eur</a></li>
                <li><a href="#">ger</a></li>
            </ul>
        </li>
    </ul>
</div>
</div>
</div>
</div>
<div class="mobile-menu"></div>
</div>
</div>
</header>
<!-- header end -->