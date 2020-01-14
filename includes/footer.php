</div>
<div id="footer">Copyright <?php echo date("Y", time()); ?>
Deeper Christian Life Church</div>
    
</body>
</html>
<?php if(isset($database)){
	$database->close_connection();

}