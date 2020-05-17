<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>         
<!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">product details</h2>
<ul>
<li><a href="#">home</a></li>
<li class="active">product details</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->
<!-- page section start -->
<div class="page-section section ptb-100">
<div class="container-fluid">
<div class="row mb-40">
<?php 

if(isset($_GET['product_id'])) {

$product_id = $_GET['product_id'];

$query_products = query("SELECT * FROM products WHERE product_id='{$product_id}'");
confirm($query_products);
$row = fetch_array($query_products);

$product_id = $row['product_id'];
$product_title = $row['product_title'];
$product_price = $row['product_price'];
$product_image = $row['product_image'];
}





?>
<!-- QuickView Product Images -->
<div class="col-md-5 col-sm-6 col-xs-12 mb-40">	
<!-- Tab panes -->
<div class="tab-content mb-10">
    <div class="pro-large-img tab-pane active" id="pro-large-img-1">
        <img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" />
    </div>
    <div class="pro-large-img tab-pane" id="pro-large-img-2">
        <img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" />
    </div>
    <div class="pro-large-img tab-pane" id="pro-large-img-3">
        <img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" />
    </div>
    <div class="pro-large-img tab-pane" id="pro-large-img-4">
        <img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" />					
    </div>
    <div class="pro-large-img tab-pane" id="pro-large-img-5">
        <img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" />
    </div>
</div>
<!-- QuickView Product Thumbnail Slider -->
<div class="pro-thumb-img-slider">
    <div><a href="#pro-large-img-1" data-toggle="tab"><img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" /></a></div>
    <div><a href="#pro-large-img-2" data-toggle="tab"><img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" /></a></div>
    <div><a href="#pro-large-img-3" data-toggle="tab"><img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" /></a></div>
    <div><a href="#pro-large-img-4" data-toggle="tab"><img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" /></a></div>
    <div><a href="#pro-large-img-5" data-toggle="tab"><img src="assets/img/product-images/<?php echo $product_image; ?>" alt="" /></a></div>
</div>
</div>
<!-- QuickView Product Details -->
<div class="col-md-7 col-sm-6 col-xs-12 mb-40">
<div class="product-details section">
<?php add_cart(); ?>
    <!-- Title -->
    <form action="product-details.php?add_cart=<?php echo $product_id; ?>" method="post" class="form-horizontal">
    <h1 class="title"><?php echo $product_title; ?></h1>
    <!-- Price Ratting -->
    <div class="price-ratting section">
        <!-- Price -->
        <span class="price float-left"><span class="new">$<?php echo $product_price; ?></span></span>
        <!-- Ratting -->
        <span class="ratting float-right">
            <i class="fa fa-star active"></i>
            <i class="fa fa-star active"></i>
            <i class="fa fa-star active"></i>
            <i class="fa fa-star active"></i>
            <i class="fa fa-star active"></i>
            <span> (01 Customer Review)</span>
        </span>
    </div>
    <!-- Short Description -->
    <div class="short-desc section">
        <h5 class="pd-sub-title">Quick Overview</h5>
                                    <p>There are many variations of passages of Lorem Ipsum avaable, b majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. make an ami jani nab majority have suffered alteration in some form, variations of passages Lorem Ipsum avaable, b majority </p>
                                </div>
                                <!-- Product Size -->
                                <div class="product-size section">
                                    <h5 class="pd-sub-title">Select Size</h5>
                                    <select class="col-md-3 form-control" name="product_size" id="product_size">
                                    <option>s</option>
                                    <option class="active">m</option>
                                    <option>x</option>
                                    <option>xl</option>
                                   </select>
                                </div>
                                <!-- Product Color -->
                               <!-- <div class="color-list section">
                                    <h5 class="pd-sub-title">Select Color</h5>
                                    <select class="form-control" name="" id="">
                                    <option class="active" style="background-color: #51bd99;"><i class="fa fa-check"></i></option>
                                    <option style="background-color: #ff7a5f;"><i class="fa fa-check"></i></option>
                                    <<option value=""></<option> style="background-color: #baa6c2;"><i class="fa fa-check"></i></option>
                                    <option style="background-color: #414141;"><i class="fa fa-check"></i></option>
                                    </select>
                                </div>-->
                                <!-- Quantity Cart -->
                                <div class="quantity-cart section">
                                    <div class="product-quantity2">
                                        <input type="text" name="product_quantity" value="0">
                                    </div>
                                    <button type="submit" name="add_cart" class="add-to-cart">
                                    <i class="fas fa-shopping-cart"></i> add to cart
                                    </button>
                                </div>
                                </form>
                                <!-- Usefull Link -->
                                <ul class="usefull-link section">
                                    <li><a href="#"><i class="pe-7s-mail"></i> Email to a Friend</a></li>
                                    <li><a href="wishlist.php?product_id=<?php echo $product_id; ?>"><i class="pe-7s-like"></i> Wishlist</a></li>
                                    <li><a href="#"><i class="pe-7s-print"></i> print</a></li>
                                </ul>
                                <!-- Share -->
                                <div class="share-icons section">
                                    <span>share :</span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Nav tabs -->
                        <div class="col-xs-12">
                            <ul class="pro-info-tab-list section">
                                <li class="active"><a href="#more-info" data-toggle="tab">More info</a></li>
                                <li><a href="#data-sheet" data-toggle="tab">Data sheet</a></li>
                                <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content col-xs-12">
                            <div class="pro-info-tab tab-pane active" id="more-info">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                            </div>
                            <div class="pro-info-tab tab-pane" id="data-sheet">
                                <table class="table-data-sheet">
                                    <tbody>
                                        <tr class="odd">
                                            <td>Compositions</td>
                                            <td>Cotton</td>
                                        </tr>
                                        <tr class="even">
                                            <td>Styles</td>
                                            <td>Casual</td>
                                        </tr>
                                        <tr class="odd">
                                            <td>Properties</td>
                                            <td>Short Sleeve</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pro-info-tab tab-pane" id="reviews">
                                <a href="#">Be the first to write your review!</a>
                            </div>
                        </div>		
                    </div>
                </div>
            </div>
            <!-- page section end -->
           <?php require_once("includes/footer.php"); ?>