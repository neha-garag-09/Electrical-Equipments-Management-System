<?php if (isset($_SESSION['C_ID']))?>


<?php include('includes/connection.php');?>  
<!--header area-->
<?php include 'includes/header.php'; ?>
<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<?php //include 'slider.php'; ?>
<style>
.mySlides {display:none;}
ul#menu li {
  display:inline;
}
</style>

<?php 
if (isset($_POST["add_to_cart"])) 
{
  $av = $_POST['av'];
$qq = $_POST["quant"];
if ($av > 0) {

  if ($av > $qq || $av == $qq)  {

  if (isset($_SESSION["cart"])) 
{
  $itemarrayid = array_column($_SESSION["cart"], "ids");
  if (!in_array($_GET["id"], $itemarrayid)) {
   
    $count=count($_SESSION["cart"]);
    $itemarray = array(
     'ids' => $_GET["id"],
     'image' => $_POST["hideimage"],
	 'name' => $_POST["hiddenname"],
     'price' => $_POST["hiddenprice"],
     'quantity' => $_POST["quant"]);
     $_SESSION["cart"][$count] = $itemarray;
    echo "<script>alert('Product is added to your cart!')</script>";
    echo "<script>window.location = 'cart.php'</script>";
  }else{
    echo "<script>alert('Item Already Added')</script>";
    echo "<script>window.location = 'cart.php'</script>";
  }
}
else
{
  $itemarray = array(
  'ids' => $_GET["id"], 
  'image' => $_POST["hideimage"],
  'name' => $_POST["hiddenname"],
  'price' => $_POST["hiddenprice"],
  'quantity' => $_POST["quant"]);
  $_SESSION['cart'][0] = $itemarray;
}
}else{
        echo '<script>alert("Invalid Quantity")</script>';
      echo '<script>window.location="012indwx.php"</script>';

}
}else{
  echo '<script>alert("Out of Stocks")</script>';
      echo '<script>window.location="products.php"</script>';
}
}



if (isset($_POST["by_now"])) 
{
  $av = $_POST['av'];
$qq = $_POST["quant"];
if ($av > 0) {

  if ($av > $qq || $av == $qq)  {

  if (isset($_SESSION["cart"])) 
{
  $itemarrayid = array_column($_SESSION["cart"], "ids");
  if (!in_array($_GET["id"], $itemarrayid)) {
   
    $count=count($_SESSION["cart"]);
    $itemarray = array(
     'ids' => $_GET["id"],
     'image' => $_POST["hideimage"],
	 'name' => $_POST["hiddenname"],
     'price' => $_POST["hiddenprice"],
     'quantity' => $_POST["quant"]);
     $_SESSION["cart"][$count] = $itemarray;
    echo "<script>alert('Product is By Now ')</script>";
    echo "<script>window.location = 'addprod.php'</script>";
  }else{
    echo "<script>alert('Item Already Added')</script>";
    echo "<script>window.location = 'addprod.php'</script>";
  }
}
else
{
  $itemarray = array(
  'ids' => $_GET["id"], 
  'image' => $_POST["hideimage"],
  'name' => $_POST["hiddenname"],
  'price' => $_POST["hiddenprice"],
  'quantity' => $_POST["quant"]);
  $_SESSION['cart'][0] = $itemarray;
}
}else{
        echo '<script>alert("Invalid Quantity")</script>';
      echo '<script>window.location="products.php"</script>';

}
}else{
  echo '<script>alert("Out of Stocks")</script>';
      echo '<script>window.location="products.php"</script>';
}
}


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Cart</title> 

</head>
<body>
 			 <ul id="menu" > 
			 <li><a  class="btn btn-primary" href="products.php"><span>View All</span>
          </a></li>
			 <?php
		$query_cat="select * from tblcategory";
		$result_cat = mysqli_query($db,$query_cat);
        while ($row_cat=mysqli_fetch_array($result_cat)) 
		{
		?>
		
		
		
  <li><a  class="btn btn-primary" href="check_cakes.php?cid=<?php echo $row_cat['category_id'];?>"><span><?php echo $row_cat['category'];?></span>
          </a></li>

		<?php
		}
		?>
		 
</ul>
<div class="row">

  <?php 
  $cid=$_REQUEST['cid']; 
 $query = 'SELECT *,category,supplier_name,concat(d.`fname`," ",d.`lname`)as name FROM tblproducts a inner join tblcategory b inner join tblsupplier c inner join tblusers d on a.`category_id` = b.`category_id` and a.`supplier_id` = c.`supplier_id` and a.`user_id` = d.`user_id` and b.`category_id`='.$cid.' and a.`quantity` != 0 GROUP BY product_id';
$result = mysqli_query($db,$query);

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
      <form method="post" action="products.php?action=add&id=<?php echo $row["product_id"]; ?>">
         <center><img src="product_image/<?php echo $row["product_image"]; ?>" style="width: 100px">
         <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>
		<!--  <h6 class="text-warning">Author :<?php echo $row["author"]; ?></h6> -->
         <h5 class="text-info">Available Qty:(<?php echo $row["quantity"]; ?>)</h5>
         <h4 class="text-danger">&#8377; <?php echo $row["price"]; ?>.00</h4>
       <input class="form-control" type="number" min="0" placeholder="Quantity" name="quant" value="1">
       <input class="form-control" type="hidden" name="av" value="<?php echo $row["quantity"]; ?>">
       <input class="form-control" type="hidden" name="hideimage" value="<?php echo $row["product_image"]; ?>">
	   <input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["product_name"]; ?>">
       <input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["price"]; ?>">
       <input class="btn btn-success" type="submit" name="add_to_cart" value="Add to Cart" style="margin-top: 10px">
	   
	   <input class="btn btn-warning" type="submit" name="by_now" value="Buy Now" style="margin-top: 10px"></center>
     </form>
    </div>
  </div>
</div>
<?php

}
?>
</div>




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