<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>



<!-- slider start -->
<div class="slider-area style-1">
<div class="container-fluid text-center">
<div class="slider-text">
<h2>summer Collection 2017 </h2>
<h3>A good looking, comfortable traditional collection</h3>
<a href="shop.php">Shop The Collection</a>
</div>
</div>
</div>
<!-- slider end -->
<!-- shop area start -->
<div class="shop-area ptb-90">
<div class="container-fluid">		
<div class="shop-style-all">
<div class="row">
<div class="grid">
<?php 
$query_product = query("SELECT * FROM products ORDER BY product_id DESC LIMIT 0,11");
confirm($query_product);

while($row = fetch_array($query_product)) {

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
            <span class="new-price">$<?php echo $product_price; ?></span>
            <span class="old-price">$70</span>
        </div>
        <div class="product-cart">
            <a href="#"><i class="pe-7s-cart"></i></a>
        </div>	
    </div>							
</div>
</div>

<?php } ?>

<!--<div class="col-md-3 col-sm-6 col-xs-12 grid-item cat2 cat3">
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
</div>-->






</div>
</div>	
</div>
<div class="view-more text-center mt-30">
<a href="shop.php">view more</a>
</div>
</div>
</div>			
<!-- shop area end -->
<!-- banner area start -->
<div class="banner-area pb-100">
<div class="container-fluid">
<div class="banner-img">
<img src="assets/img/banner/1.jpg" alt="">
</div>
</div>
</div>
<!-- banner area end -->
<!-- blog area start -->
<div class="blog-area pb-70">
<div class="container-fluid">
<div class="section-title text-center mb-50">
<h3>Latest News</h3>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
</div>
<div class="row">
<div class="col-md-3 col-sm-6">
<div class="single-blog mb-30">
<a href="blog-details.html">
<img src="assets/img/blog/1.jpg" alt="">
</a>
<div class="blog-title">
<span>December 8, 2017</span>
<h3><a href="blog-details.html">Lorem Ipsum is simply dummy</a></h3>
<a href="blog-details.html">read more</a>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="single-blog mb-30">
<a href="blog-details.html">
<img src="assets/img/blog/2.jpg" alt="">
</a>
<div class="blog-title">
<span>December 8, 2017</span>
<h3><a href="blog-details.html">Lorem Ipsum is simply dummy</a></h3>
<a href="blog-details.html">read more</a>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="single-blog mb-30">
<a href="blog-details.html">
<img src="assets/img/blog/5.jpg" alt="">
</a>
<div class="blog-title">
<span>December 8, 2017</span>
<h3><a href="blog-details.html">Lorem Ipsum is simply dummy</a></h3>
<a href="blog-details.html">read more</a>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="single-blog mb-30">
<a href="blog-details.html">
<img src="assets/img/blog/3.jpg" alt="">
</a>
<div class="blog-title">
<span>December 8, 2017</span>
<h3><a href="blog-details.html">Lorem Ipsum is simply dummy</a></h3>
<a href="blog-details.html">read more</a>
</div>
</div>
</div>
</div>	
</div>
</div>
<!-- blog area end -->
<!-- footer area end -->

<?php require_once("includes/footer.php"); ?>














<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.meanmenu.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
