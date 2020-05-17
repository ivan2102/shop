<?php
if(!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

}else {



?>


<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.php?dashboard">Admin Panel</a><br>
</div><!--navbar header Ends -->
<a class="navbar-brand" href="../index.php">Home</a>
<ul class="nav navbar-right top-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-user"></i>
<?php echo $admin_name; ?> <b class="caret"></b>
</a>

<ul class="dropdown-menu">
<li>
<a href="index.php?user_profile=<?php echo $admin_id; ?>">
<i class="fa fa-fw fa-user"></i> Profile
</a>
</li>

<li>
<a href="index.php?view_products">
<i class="fa fa-fw fa-envelope"></i> Products
<span class="badge"><?php echo $count_products; ?></span>
</a>
</li>

<li>
<a href="index.php?view_customers">
<i class="fa fa-fw fa-cog"></i> Customers
<span class="badge"><?php echo $count_customers; ?></span>
</a>
</li>

<li class="divider"></li>

<li>
<a href="logout.php">
<i class="fa fa-fw fa-power-off"></i> Log Out
</a>

</li>

</ul>
</li>
</ul><!--nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
<li>
<a href="index.php?dashboard">
<i class="fa fa-fw fa-tachometer-alt"></i> Dashboard
</a>
</li>

<li>
<a href="#" data-toggle="collapse" data-target="#products">
<i class="fa fa-fw fa-table"></i> Products
<i class="fa fa-fw fa-caret-down"></i>
</a>
<ul id="products" class="collapse">
<li>
<a href="index.php?add_product">Add Product</a>
</li>

<li>
<a href="index.php?view_products">View Products</a>
</li>
</ul>
</li>

<li>
<a href="index.php?view_customers">
<i class="fa fa-fw fa-edit"></i> View Customers
</a>
</li>

<li>
<a href="index.php?view_orders">
<i class="fa fa-fw fa-list"></i> View Orders
</a>
</li>

<li>
<a href="index.php?view_payments">
<i class="fa fa-fw fa-pencil-alt"></i> View Payments
</a>
</li>

<li>
<a href="#" data-toggle="collapse" data-target="#users">
<i class="fa fa-fw fa-user"></i> Users
<i class="fa fa-fw fa-caret-down"></i>
</a>

<ul id="users" class="collapse">
<li>
<a href="index.php?add_user">Add User</a> 
</li>

<li>
<a href="index.php?view_users">View Users</a> 
</li>

<li>
<a href="index.php?edit_profile=<?php echo $admin_id; ?>">Edit Profile</a> 
</li>
</ul>
</li>

<li>
<a href="#" data-toggle="collapse" data-target="#comments">
<i class="fa fa-fw fa-comment"></i> Comments
<i class="fa fa=fw fa-caret-down"></i>
</a>

<ul id="comments" class="collapse">
<li>
<a href="index.php?add_comment">Add Comment</a>
</li>

<li>
<a href="index.php?view_comments">View Comments</a>
</li>
</ul>
</li>

<li>
<a href="#" data-toggle="collapse" data-target="#terms">
<i class="fa fa-table fa-fw"></i> Terms
<i class="fa fa-caret-down fa-fw"></i>
</a>

<ul id="terms" class="collapse">
<li>
<a href="index.php?add_term">Add Term</a>
</li>

<li>
<a href="index.php?view_terms">View Terms</a>
</li>
</ul>
</li>

<li>
<a href="logout.php">
<i class="fa fa-fw fa-power-off"></i> Log Out
</a>
</li>

</ul>

</div>

</nav>

<?php } ?>