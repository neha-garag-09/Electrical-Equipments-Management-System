 <?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

 <?php 
 
 
if (isset($_POST["submit"])) 
{



  

  if ($_SESSION["cart"] == $_GET["id"]) 
{

   $itemarrayid = array_column($_SESSION["cart"], "ids");
  if (!in_array($_GET["id"], $itemarrayid)) {
   
    $count=count($_SESSION["cart"]);
    $itemarray = array(
     'ids' => $_GET["id"],
     
     'quantity' => $_POST["quantity"]);
	
     $_SESSION["cart"][$count] = $itemarray;
    echo "<script>alert('quantity is By Now ')</script>";
    echo "<script>window.location = 'cart.php'</script>";
  }else{
    echo "<script>alert('quantity Item Already Added')</script>";
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
  'quantity' => $_POST["quantity"]);
  $_SESSION['cart'][0] = $itemarray;
}


} 
 
 
 if (isset($_GET["action"])) {
  if ($_GET["action"]=='delete') {
    foreach ($_SESSION["cart"] as $keys => $values) {
      if ($values['ids']==$_GET["id"]) {
        unset($_SESSION["cart"][$keys]);
        echo '<script>alert("Product is Remove")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
} 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["cart"] as &$value){
    if($value['ids'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
		
        break; // Stop the loop after found the product
    }
}

    
}
?>

 <div class="card mb-3">
            <div class="card-header">
              <center><h2 class="fas fa-shopping-cart">Cart(s)</h2></center>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table " width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                      <!-- <th>Image</th>-->
                                        <th>Product</th>
                                        <th width="300">Quantity</th>
                                        <th width="300">Price</th>
                                        <th>Total</th> 
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if (!empty($_SESSION["cart"])) {
                                  $_SESSION['mm']=0;
                                  foreach($_SESSION["cart"] as $keys => $values){
                                    ?>
                                    <tr>
                                     <!-- <td><center><img src="product_image/<?php echo $values["product_image"]; ?>" style="width: 100px"></center></td>-->
                                      <td><?php echo $values["name"]; ?></td>
                                      <td>
									  <form method="post" action="cart.php?action=update&id=<?php echo $values["ids"]; ?>">
									  <?php //echo $values["quantity"]; ?>
									  <input class="form-control" type="number" name="quantity" value="<?php echo  $values["quantity"]; ?>">
									  <input class="form-control" type="hidden" name="hideimage" value="<?php echo $values["image"]; ?>">
	   <input class="form-control" type="hidden" name="hiddenname" value="<?php echo $values["name"]; ?>">
       <input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $values["price"]; ?>">
									   <input class="btn btn-success" type="submit" name="submit" value="Submit" style="margin-top: 10px">
	   
	
     </form>
									  </td>
                                      <td>&#8377; <?php echo $values["price"]; ?></td>
                                      <td>&#8377; <?php echo $values["quantity"] * $values["price"]; ?></td>
                                      <td><a class="btn btn-danger" type="button" onclick="return confirm('Are you sure?')" href="cart.php?action=delete&id=<?php echo $values["ids"]; ?>">Remove</a></td>
                                    </tr>
                                    <?php 
                                    $name= $values["name"];
                                    

                                    $_SESSION['mm'] = $_SESSION['mm'] + ($values["quantity"] * $values["price"]);

                                  }
                                  ?>
                                
                             </tbody>
                             <tr>
                               <td colspan="4" align="right">Total Price</td>
                                  <td align="left">&#8377; <?php echo $_SESSION['mm']; ?></td>
                                  <td><a type="button" class="btn btn-success" href="addprod.php" >Proceed and Checkout</a></td>
                             </tr>
                               <?php
                                }
                                 ?>
                              </table>
                        </div>
                    
            </div>
           
          </div>

          
        </div>
        <?php include 'includes/footer.php'; ?>