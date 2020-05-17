<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>


<div id="content">
<div class="container">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li>Terms & Condition | Refund Policy</li>
</ul>
</div><!--col-md-12 -->

<div class="col-md-3">
<div class="box">
<ul class="nav nav-pills nav-stacked">
<?php 

$query_terms = query("SELECT * FROM terms LIMIT 0,1");
confirm($query_terms);
while($row = fetch_array($query_terms)) {

    $term_title = $row['term_title'];
    $term_link = $row['term_link'];

?>

<li class="active">
<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>
</a>
</li>

<?php } ?>

<?php 

$query_terms = query("SELECT * FROM terms");
confirm($query_terms);

$count = mysqli_num_rows($query_terms);

$query_count_terms = query("SELECT * FROM terms LIMIT 1,$count");
confirm($query_count_terms);
while($row = fetch_array($query_count_terms)) {

    $term_title = $row['term_title'];
    $term_link = $row['term_link'];

?>

<li>
<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>
</a>
</li>

<?php }  ?>
</ul>
</div>
</div><!--col-md-3 Ends -->

<div class="col-md-9">
<div class="box">
<div class="tab-content">
<?php 

$query_terms = query("SELECT * FROM terms LIMIT 0,1");
confirm($query_terms);
while($row = fetch_array($query_terms)) {

    $term_title = $row['term_title'];
    $term_link = $row['term_link'];
    $term_description = $row['term_description'];


?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in active">

<h1><?php echo $term_title ?></h1>

<p><?php echo $term_description; ?></p>
</div>

<?php } ?>

<?php 

$query_terms = query("SELECT * FROM terms");
confirm($query_terms);

$count = mysqli_num_rows($query_terms);

$query_count_terms = query("SELECT * FROM terms LIMIT 1,$count");
confirm($query_count_terms);
while($row = fetch_array($query_count_terms)) {

    $term_title = $row['term_title'];
    $term_link = $row['term_link'];
    $term_description = $row['term_description'];


?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in">

<h1><?php echo $term_title; ?></h1>

<p><?php echo $term_description; ?></p>

</div>




<?php } ?>

</div>

</div>
</div><!--col-md-9 Ends -->
</div>
</div>















<?php require_once("includes/footer.php"); ?>