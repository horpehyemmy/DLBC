<?php
// require_once("../includes/header.php");

// require_once("../includes/config.php");
   session_start();
   
   if(session_destroy()) {
      header("Location: adminlogin.php");
   }
?>