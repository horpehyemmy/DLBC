<?php
session_start();
require_once("../includes/header.php");
require_once("../includes/config.php");

?>
<?php

if(isset($_POST['submit'])){//username and password sent from form
	$myusername = mysqli_real_escape_string($db,$_POST['username']);	 
	$mypassword = mysqli_real_escape_string($db,$_POST['password']);
   $_SESSION['name'] = $myusername;
    
	$sql = "SELECT * from login where username ='$myusername' and password ='$mypassword'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	//$active = $row['active'];
	//counting row

	$count = mysqli_num_rows($result);
	if($row){
     $_SESSION['name'] = $myusername;
     // header("location:adminview.php");
	}else{

		$error = "Your Login Name or Password is invalid";
		// echo $error;
	
	}
}
?>
<form method="post" action="adminview.php">
<?php 
	global $error;
	if(isset($error)){
	?><h4 style="color:red;"> <?php echo $error; }?></h4>
Username:<input type="text" name="username" id="name"value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username']);?>"><br>
Password:<input type="password" name="password" id="password" value="">
<input type="submit" name="submit" id="submit" value="Login">
	</form>
<?php
require_once("../includes/footer.php");

?>