<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>         
<!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">shop page</h2>
<ul>
<li><a href="#">home</a></li>
<li class="active">shop</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->
<!-- shop area start -->
<div class="shop-area pt-100 pb-70">
<div class="container-fluid">
<div class="shop-title-text text-center">
<h2>awesome collection 2017 </h2>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
</div>
		
<div class="shop-style-all mt-50">
<div class="row">
<div class="grid">
<?php 
$query_products = query("SELECT * FROM products");
confirm($query_products);
while($row = fetch_array($query_products)) {

$product_id = $row['product_id'];
$product_title = $row['product_title'];
$product_price = $row['product_price'];
$product_image = $row['product_image'];




?>
<div class="col-md-3 col-sm-6 col-xs-12 grid-item cat1">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="product-details.php?product_id=<?php echo $product_id; ?>">
<img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" />	
</a>	
<div class="shop-title title-style-1">
<h3><a href="product-details.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a></h3>
<span class="new-price">$<?php echo $product_price; ?></span><br>
<span class="old-price">$70</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>							
</div>
</div>

<?php }?>


<!--<div class="col-md-3 col-sm-6 col-xs-12 grid-item">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/2.jpg" alt="" />
</a>
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Beige Tote</a></h3>
<span>$80</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>						
</div>
<div class="col-md-6 col-sm-6 col-xs-12 grid-item cat1">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/3.jpg" alt="" />
</a>
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Classic Gloves</a></h3>
<span>$90</span>
<span class="old-price">$100</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 grid-item cat2">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/4.jpg" alt="" />
</a>
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Beige Tote</a></h3>
<span>$40</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 grid-item cat1">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/5.jpg" alt="" />
</a>	
<div class="shop-title title-style-1">
<h3><a href="#">Classic Gloves</a></h3>
<span class="new-price">$50</span>
<span class="old-price">$70</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 grid-item cat3">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/6.jpg" alt="" />	
</a>
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Classic Gloves</a></h3>
<span>$60</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 grid-item cat2 cat3">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/7.jpg" alt="" />
</a>
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Classic Gloves</a></h3>
<span>$80</span>
<span class="old-price">$90</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 grid-item cat3">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/8.jpg" alt="" />
</a>	
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Classic Gloves</a></h3>
<span>$90</span>
<span class="old-price">$120</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 grid-item cat1">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/9.jpg" alt="" />
</a>
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Classic Gloves</a></h3>
<span>$70</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 grid-item cat1">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/10.jpg" alt="" />	
</a>	
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Classic Gloves</a></h3>
<span>$20</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div>
<div class="col-md-3 hidden-sm col-xs-12 grid-item cat1">
<div class="shop hover-style mb-30">
<div class="shop-img">
<a href="preduct-details.html">
<img src="assets/img/shop/11.jpg" alt="" />	
</a>
<div class="shop-title title-style-1">
<h3><a href="preduct-details.html">Classic Gloves</a></h3>
<span>$30</span>
</div>
<div class="product-cart">
<a href="#"><i class="pe-7s-cart"></i></a>
</div>	
</div>	
</div>
</div> -->




</div>
</div>	
</div>
</div>
</div>			
<!-- shop area end -->
<?php require_once("includes/footer.php"); ?>