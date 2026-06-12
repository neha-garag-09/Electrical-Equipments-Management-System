
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/sb-new.css">
  </head>

 <body style="background-image: url('images/register2.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">


    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"><b><center>Register</center></b></div>
        <div class="card-body">
          <?php 
          session_start();
          if (isset($_GET['error'])) {
            if ($_GET["error"]=="emptyfields") {
              echo '<p class="signuperror">Fill in all fields</p>';
            }
            elseif ($_GET["error"]=="invalidmail") {
               echo '<p class="signuperror">Invalid Email</p>';
            }
            elseif ($_GET["error"]=="invaliduid") {
               echo '<p class="signuperror">Invalid Username</p>';
            }
            elseif ($_GET["error"]=="passwordcheck") {
               echo '<p class="signuperror">Your password do not match</p>';
            }
            elseif ($_GET["error"]=="usertaken") {
               echo '<p class="signuperror">Username is already taken</p>';
            }
            elseif ($_GET["error"]=="emailtaken") {
               echo '<p class="signuperror">Email/Username is already taken</p>';
            }
            } 
             if (isset($_GET['register'])) {
              if ($_GET["register"]=="success") {
               echo '<p class="signupsuccess">Register successful</p>';
             }
         }
         
           ?>
          <form action="includes/signup.php" method="post" id="formID">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" name="C_FNAME" minlength="3" title="Min 3 Character" class="validate[required,custom[onlyLetter]] form-control" placeholder="First name"autofocus="autofocus">
                    <label for="firstName">First name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastName" name="C_LNAME" class="validate[required,custom[onlyLetter]] form-control" placeholder="Last name">
                    <label for="lastName">Last name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" id="inputage" name="C_AGE"  placeholder="Age" class="validate[required,custom[onlyNumber]] form-control">
                <label for="inputage"> Age</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                
				  <input type="text"  id="inputAddress" name="C_ADDRESS"  minlength="3" title="Min 15 Character Fill" placeholder="address" class="validate[required] form-control">
                <label for="inputAddress">Address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" maxlength="10" id="inputpnumber " name="C_PNUMBER" minlength="10" class="validate[required] form-control" pattern="[6-9]{1}[0-9]{9}" >
                <label for="inputpnumber">Phone Number</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <select type="text" id="inputGender" name="C_GENDER"  placeholder="Gender" class="validate[required] form-control">
                 
				  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="C_EMAILADD"  placeholder="Email Address" class="validate[required,custom[email]] form-control">
                <label for="inputEmail">Email Address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputZipcode" name="ZIPCODE"  placeholder=" Zipcode" class="validate[required,custom[onlyNumber]] form-control">
                <label for="inputZipcode">Zipcode</label>
              </div>
            </div>
             <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputuser" name="username" placeholder="Username" class="validate[required] form-control">
                <label for="inputuser">User Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="password" placeholder="Password" class="validate[required] form-control">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" name="pwdcon" placeholder="Confirm Password" class="validate[required] form-control">
                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="signups-submit">Save</button>
          </form>
          <div class="text-center">
          <!--   <a class="d-block small mt-3" href="login.php">Login</a> -->
            <a class="d-block small mt-3" href="home/index.php">Back</a>
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
<?php include('val.php'); ?>
</html>
