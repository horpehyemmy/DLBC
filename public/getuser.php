<?php
require_once("../includes/config.php");


$area_id = $_GET['q'];


$sql = "SELECT area.id,group_of_districts.name,region.name AS reg_name FROM area 
		JOIN group_of_districts ON group_of_districts.id = area.group_of_district_id
		JOIN region ON region.id = area.region_id
		WHERE area.id = '".$area_id."'";

$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result)) {
	?>
	Group of District:
  <input type="text" class="fill" name="group_of_district" id="group_of_district" value="<?php echo $row['name'];?>" readonly="readonly">
  <br>
  Region:
  <input type="text" name="region" class="fill" id="region" value="<?php echo $row['reg_name'];?>" readonly="readonly"/> 
  <?php

}



?>


