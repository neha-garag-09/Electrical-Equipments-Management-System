<?php include('includes/connection.php');?>  
<?php

$username=$_POST['username'];
//$C_PNUMBER=$_POST['C_PNUMBER'];
$sql="select * from tblcustomer where username='$username'  ";
$res=mysqli_query($db,$sql);
if($row=mysqli_fetch_array($res))
{

session_start();
				$cid = $row['C_ID'];


?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/sb-new.css">
  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header"><h3> Login</h3></div>
        <div class="card-body">
         <?php /*session_start();
          if (isset($_GET['error'])) {
            if ($_GET["error"]=="wrongpwd") {
              echo '<p class="signuperror">Wrong password</p>';
            }
            
            } 
             
         */
           ?>
          <form action="getpassword.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="txtPassword" name="new_pwd" class="form-control" placeholder="New Password" required autofocus="autofocus">
                <label for="inputEmail">New Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="txtConfirmPassword" name="conf_pwd" class="form-control" placeholder="Confirm Password" >
                <label for="inputPassword">Confirm Password</label>
              </div>
            </div>
			<input type="hidden" value="<?php echo $cid ?>" name="cid" >
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" name="login-submit" onclick="return Validate()" >Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Signup</a>
			<a class="d-block small mt-3" href="forgotpwd.php">Forgot Password</a>
            <a class="d-block small mt-3" href="index.php">Home</a>
          </div>
        </div>
      </div>
    </div>

 <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

<?php

}

else 
{
?>
<script>
alert('Invaliede User Name');
history.back();</script>

<?php
}

?>
