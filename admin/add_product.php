<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {

    
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            <i class="fa fa-tachometer-alt"></i> Dashboard / Add Product
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">
         <i class="fa fa-money fa-fw"></i> Add Product
        </h3>
        </div><!--panel-heading Ends -->

        <div class="panel-body">
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label">Product Title: </label>
                    <div class="col-md-6">
                        <input type="text" name="product_title" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Product Price: </label>
                    <div class="col-md-6">
                        <input type="number" name="product_price" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Product Image: </label>
                    <div class="col-md-6">
                        <input type="file" name="product_image" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                    <input type="submit" name="add_product" value="Add Product" class="btn btn-primary form-control">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<?php 

if(isset($_POST['add_product'])) {

    $product_title = escape_string($_POST['product_title']);
    $product_price = escape_string($_POST['product_price']);
    $product_image = escape_string($_FILES['product_image']['name']);
    $temp_image = escape_string($_FILES['product_image']['tmp_name']);

    move_uploaded_file($temp_image,"assets/img/customer_images/$product_image");

    $query_inser_product = query("INSERT INTO products(product_title,product_price,product_image)
    VALUES('{$product_title}','{$product_price}','{$product_image}')");
    confirm($query_inser_product);

    if($query_inser_product) {

        echo "<script>alert('New Product added successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}



?>


<?php } ?>