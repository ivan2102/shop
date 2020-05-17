<?php 

if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {


?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tachometer-alt"></i> Dashboard / View Products
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Products
                </h3>
            </div><!--panel-heading Ends -->

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="bg-info">
                            <tr>
                                <th>Product No</th>
                                <th>Product Title</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <th>Edit Product</th>
                                <th>Delete Product</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;

                            $query_products = query("SELECT * FROM products");
                            confirm($query_products);
                            while($row = fetch_array($query_products)) {

                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_price = $row['product_price'];
                                $product_image = $row['product_image'];
                                $i++;
                                
                                ?>
                                <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td>$<?php echo $product_price; ?></td>
                                <td>
                                    <img src="assets/img/product-images/<?php echo $product_image; ?>" width="60" height="60" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-info btn-lg" href="index.php?edit_product=<?php echo $product_id; ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                  </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-lg" href="index.php?delete_product=<?php echo $product_id; ?>">
                                    <i class="fas fa-trash"></i>
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