<?php 

//Helper Functions //

function redirect($location) {

    header("Location: $location");
}

function last_id() {

    global $connection;

    return mysqli_insert_id($connection);
}

function set_message($message) {

    if(!empty($message)) {

        $_SESSION['message'] = $message;

    }else {

        $message = "";
    }
}


function display_message() {

    if(isset($_SESSION['message'])) {

    echo $_SESSION['message'];
    unset($_SESSION['message']);

    }
}

function confirm($result) {

    global $connection;

    if(!$result) {

        die("QUERY_FAILED" . mysqli_error($connection));
    }
}

function escape_string($string) {
     
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function query($sql) {

    global $connection;

    return mysqli_query($connection, $sql);
}

function fetch_array($result) {

    return mysqli_fetch_array($result);
}

//End Helper Functions //

//IP Address Code Starts //

function getRealUserIp() {

    switch(true) {

        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

//IP Address Code Ends //

function add_cart() {

    if(isset($_GET['add_cart'])) {

        $ip_address = getRealUserIp();

        $product_id = $_GET['add_cart'];
        $product_quantity = $_POST['product_quantity'];
        $product_size = $_POST['product_size'];

        $query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address' AND product_id='$product_id'");
        confirm($query_cart);

        if(mysqli_num_rows($query_cart) > 0) {

            echo "<script>alert('This Product has already been added into Cart')</script>";
            echo "<script>window.open('cart.php?product_id=$product_id','_self')</script>";

        }else {
           
            $query_insert_cart = query("INSERT INTO cart(product_id,ip_address,product_quantity,product_size)
            VALUES('{$product_id}','{$ip_address}','{$product_quantity}','{$product_size}')");
            confirm($query_insert_cart);

            if($query_insert_cart) {

                
                echo "<script>window.open('cart.php?product_id=$product_id','_self')</script>";
            }

        }
    }
}

function total() {

    $ip_address = getRealUserIp();

    $total = 0;

    $query_total = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
    confirm($query_total);

    while($row = fetch_array($query_total)) {

        $product_id = $row['product_id'];
        $product_quantity = $row['product_quantity'];
        $product_size = $row['product_size'];

        $quert_products = query("SELECT * FROM products WHERE product_id='$product_id'");
        confirm($quert_products);

        while($row = fetch_array($quert_products)) {

            $sub_total = $row['product_price'] * $product_quantity;
            $total += $sub_total;
        }
    }

    echo "$" . $total;
}




















?>