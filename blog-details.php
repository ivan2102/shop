<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>

<!-- breadcrumb start -->
<div class="breadcrumb-area">
<div class="container-fluid text-center">
<div class="breadcrumb-stye gray-bg ptb-100">
<h2 class="page-title">blog details</h2>
<ul>
<li><a href="#">home</a></li>
<li class="active">blog details</li>
</ul>
</div>
</div>
</div>
<!-- breadcrumb end -->
<!-- blog-area start -->
<div class="blog-details-area ptb-100">
<div class="container-fluid">
<div class="row">
<div class="col-lg-offset-2 col-lg-8 col-md-12">
<div class="blog-details">
<img src="assets/img/blog/4.jpg" alt="">
<div class="blog-details-text">
<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. U enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dol in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. U enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
<div class="tag-share text-center">
<div class="tag">
<ul>
<li>tags :</li>
<li><a href="#">fashion ,</a></li>
<li><a href="#">new style ,</a></li>
<li><a href="#">spring</a></li>
</ul>
</div>
<div class="share">
<ul>
<li>share :</li>
<li>
<a href="https://www.facebook.com/devitems/?ref=bookmarks">
<i class="fa fa-facebook"></i>
</a>
</li>
<li>
<a href="https://twitter.com/devitemsllc">
<i class="fa fa-twitter"></i>
</a>
</li>
<li>
<a href="https://www.google.com/">
<i class="fa fa-google-plus"></i>
</a>
</li>
<li>
<a href="https://www.linkedin.com/">
<i class="fa fa-linkedin"></i>
</a>
</li>
<li>
<a href="https://www.instagram.com/devitems/">
<i class="fa fa-instagram"></i>
</a>
</li>
</ul>
</div>
</div>
<div class="next-previous text-center">
<div class="previous">
<a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a>
</div>
<div class="next">
<a href="#">next <i class="fa fa-angle-right" aria-hidden="true"></i></a>
</div>
</div>
<div class="leave-comment">
<h3 class="leave-comment-text">Leave a Reply</h3>
<form action="" method="post" class="form-horizontal">
<div class="row">
<div class="col-md-6">
<div class="leave-form">
<input name="comment_author" placeholder="Name*" type="text">
</div>
</div>
<div class="col-md-6">
<div class="leave-form">
<input name="comment_email" placeholder="Email*" type="email">
</div>
</div>
<div class="col-md-12">
<div class="text-leave">
<textarea name="comment_content" placeholder="Comment*"></textarea>
<button class="submit" name="submit" type="submit">Send Commant</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- blog-area end -->

<?php 

if(isset($_POST['submit'])) {

    $comment_author = escape_string($_POST['comment_author']);
    $comment_email = escape_string($_POST['comment_email']);
    $comment_content = escape_string($_POST['comment_content']);


$query_insert_comments = query("INSERT INTO comments(comment_author,comment_email,comment_date,comment_content,comment_status)
VALUES('{$comment_author}','{$comment_email}',NOW(),'{$comment_content}','unapproved')");
confirm($query_insert_comments);

if($query_insert_comments) {

    echo "<script>alert('One Comment inserted successfully')</script>";
    echo "<script>window.open('blog-details.php','_self')</script>";
  
}

}

?>

<?php require_once("includes/footer.php"); ?>















