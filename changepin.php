<?php session_start(); ?>
<?php include('includes/connection.php');?>  
<?php 
 $cid=$_SESSION['cid'];
 
 $old_pwd=$_POST['old_pwd'];
 $new_pwd=$_POST['new_pwd'];
 $hashedPwd =password_hash($new_pwd,PASSWORD_DEFAULT);
 $query = "SELECT * FROM tblcustomer  WHERE  C_ID ='$cid' ";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              $row = mysqli_fetch_array($result);
			  //$pwdCheck = password_verify($old_pwd,$row['password']);
			  
if (password_verify($old_pwd,$row['password'])) {
   // echo 'Password is valid!';
    $sql1 = "update tblcustomer set password = '$hashedPwd' where 	C_ID ='$cid'";
			$res1 = mysqli_query($db,$sql1);
			?>
			<script>
			alert('Successfully Password is Changeed');
			document.location="012index.php";
			</script>
			<?php
   
} else {
    echo 'Invalid password.';
}



?>