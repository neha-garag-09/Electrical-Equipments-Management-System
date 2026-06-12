<?php session_start(); ?>
<?php include('includes/connection.php');?>  
<?php 
 $cid=$_POST['cid'];
 
 $new_pwd=$_POST['new_pwd'];
 //$new_pwd=$_POST['new_pwd'];
 $hashedPwd =password_hash($new_pwd,PASSWORD_DEFAULT);
// password_verify($old_pwd,$row['password'])
			  
   // echo 'Password is valid!';
   echo $sql1 = "update tblcustomer set password = '$hashedPwd' where 	C_ID ='$cid'";
			$res1 = mysqli_query($db,$sql1);
			
			
   

?>
<script>
alert('Your Password is <?php echo $new_pwd; ?> ');
document.location="index.php";
</script>
