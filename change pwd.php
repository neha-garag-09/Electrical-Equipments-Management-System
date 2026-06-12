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
      echo '<script>window.location="index.php"</script>';

}
}else{
  echo '<script>alert("Out of Stocks")</script>';
      echo '<script>window.location="index.php"</script>';
}
}


 ?>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Change Password</div>
								</div>
								<div class="card-body">
									<div class="row">
						<form name="form2" method="post" action="changepin.php">
						

						<table width="325" height="242" border="0">
                           <tr>
                            <td>Old </td>
                            <td><input type="password" name="old_pwd" class="form-control"></td>
                          </tr> 
                          <tr>
                            <td>New password </td>
                            <td><input type="password" name="new_pwd" class="form-control"></td>
                          </tr>
                        <!--   <tr>
                            <td>Confirm password </td>
                            <td><input type="password" name="conf_pwd" class="form-control"></td>
                          </tr> -->
                          <tr>
                            <td colspan="2"><input type="submit" name="Submit" class="btn btn-success" value="Change" /></td>
                          </tr>
                        </table>
						<p>
						  <label>    </label>
                        </p>
						</form>
						</div>
						</div>
						</div>
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