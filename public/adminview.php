<?php
session_start();
require_once("../includes/config.php");
require_once("../includes/header.php");

$user_check = $_SESSION['name'];
// echo "<h3>Now at the Welcome page</h3>";
$ses_sql = mysqli_query($db,"select username from login where username = '$user_check' ");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];
if(!isset($_SESSION['name'])){
	header("location:adminlogin.php");
}

?>
<h3>Menu</h3>
<ul>
	<li><a href='applicant.php?page=1'>View Applicant</a></li>
	<li><a href="adminlogout.php">Logout</a></li>
</ul>