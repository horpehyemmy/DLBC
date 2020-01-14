<?php
$db=new mysqli('localhost','root',"",'deeper_life');
if(mysqli_connect_errno()){
	echo "error:could not connect to database.please try again later.";
	exit;
}
?>