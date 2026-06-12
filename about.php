<?php if (isset($_SESSION['C_ID']))?>


<?php include('includes/connection.php');?>  
<!--header area-->
<?php include 'includes/header.php'; ?>
<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<?php include 'slider.php'; ?>
<style>
.mySlides {display:none;}
ul#menu li {
  display:inline;
}
</style>


<!DOCTYPE html>
<html>
<head>
  <title>Cart</title> 

</head>
<body>
 			
<div class="row" align="center">


<div class="col-lg-8" 	>
  <div class="card mb-8">
    <div class="card-body">
   <p>The main objective of the Online Book Store is to manage the details of Books,Customer,Payment,Delivery,Bills. It manages all the information about Books, Stock, Bills, Books. The project is totally built at administrative end and thus only the administrator is guaranteed the access. The purpose of the project is to build an application program to reduce the manual work for managing the Books, Customer, Stock, Payment. It tracks all the details about the Payment,Delivery,Bills.</p>
    </div>
  </div>
</div>

</div>




<marquee>
<div class="w3-content w3-display-container">
<div class="row">

  <?php 
  $query = "SELECT * FROM tblproducts WHERE quantity != 0 GROUP BY product_code";
$result = mysqli_query($db,$query);
if (mysqli_num_rows($result)>0) 
{
 while ($row=mysqli_fetch_array($result)) 
{
    $_SESSION['zero'] = $row["quantity"];
    $_SESSION['one'] = $row["product_code"];
if ($_SESSION['zero']==1) {
   $sqls = "UPDATE tblproducts SET status = 'Unavailable' WHERE product_code='".$_SESSION['one']."'";
     mysqli_query($db,$sqls)or die(mysqli_error($db));
}
   ?>
<div class="col-lg-3">
  <div class="card mb-3">
    <div class="card-body">
      <form method="post" action="index.php?action=add&id=<?php echo $row["product_code"]; ?>">
         <center><img src="product_image/<?php echo $row["product_image"]; ?>" style="width: 100px">
         <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>
		 <h6 class="text-warning">Author :<?php echo $row["author"]; ?></h6>
         <h5 class="text-info">Available Qty:(<?php echo $row["quantity"]; ?>)</h5>
         <h4 class="text-danger">&#8369 <?php echo $row["price"]; ?>.00</h4>
       <input class="form-control" type="number" min="0" placeholder="Quantity" name="quant" value="1">
       <input class="form-control" type="hidden" name="av" value="<?php echo $row["quantity"]; ?>">
       <input class="form-control" type="hidden" name="hideimage" value="<?php echo $row["product_image"]; ?>">
	   <input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["product_name"]; ?>">
       <input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["price"]; ?>">
       <input class="btn btn-success" type="submit" name="add_to_cart" value="Add to Cart" style="margin-top: 10px"></center>
     </form>
    </div>
  </div>
</div>
<?php
}
}
?>
</div>
</div>
</marquee>
</body>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
<?php include 'includes/footer.php'; ?>
</html>