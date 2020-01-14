<?php
require_once("../includes/header.php");
require_once("../includes/config.php");
?>

<table id="example" class="display" width="100%" cellspacing="0">	
	
	<?php
	if(isset($_GET['id']))
	$id=$_GET['id'];



	$query = "SELECT applicant.id,applicant.title,applicant.first_name,applicant.last_name,applicant.gender,status.name AS status,applicant.place_of_work,applicant.age,applicant.tel_number,applicant.residential_address,area.name AS area,applicant.group_of_district AS district,applicant.region_id AS region,languages.name AS lang,info_media.name AS info FROM applicant 
				join area ON area.id = applicant.area_id
				join status ON status.id = applicant.status_id
				join languages ON languages.id =applicant.lang_id
				JOIN info_media ON info_media.id =applicant.info_media_id
				WHERE applicant.id=$id";
		
		
		

	$result = mysqli_query($db,$query);
	$counter = 0;
	while($row = mysqli_fetch_array($result)){
		
	?>
	</tbody>
</table>
<form method="post" action="">
		<table>

			Title:
	    <input type="text" value="<?php echo $row['title']?>">
	 
	  <br>
	  <br>
	  First Name:
	  <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']?>" />
	  <br />
	  <br>
	   Last Name:
	  <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']?>"/>
	  <br>
	  Gender:
	  <input type="text" name="gender" id="gender" value="<?php echo $row['gender']?>"/>
	  
	 <br>
	 <br>
	  Status:
		 <input type="text" name="status" id="status" name="status" value="<?php echo $row['status']?>"/>

	 <br>
	 <br>
	 Place of Work:
	  <input type="text" id="place_of_work" name="place_of_work" value="<?php echo $row['place_of_work']?>"/>
	  <br>
	  Age:
	  <input type="number" id="age" name="age" value="<?php echo $row['age']?>"/>
	  <br>
	 
	  <br>
	  Telephone Number:
	  <input type="text" id="phone_no" name="phone_no" value="<?php echo $row['tel_number']?>"/>
	  <br>
	  Residential Address:
	 <input type="text" id="address" name="address" value="<?php echo $row['residential_address']?>"/>
	  <br>
	  Residential Area:
	  <input type="text" name="area" onchange="showUser(this.value)" id="area" value="<?php echo $row['area']?>"/>
	  <br>
	  <br>
	  Group of district:
	  <input type="text" id="group_of_district" name="group_of_district" value="<?php echo $row['district']?>"/>
	  <br>
	 Region:
	 <input type="text" id="Region" name="Region" value="<?php echo $row['region']?>"/>
	  <br>
	 
	  <br>
	 
	  Languages:
	<input type="text" name="language" id="language" value="<?php echo $row['lang']?>"/>
	
	 <br>
	How did you hear about the programme?:
	<input type="text" name="info" id="info" value="<?php echo $row['info']?>">
	
		</table>
		</form>
	 <?php
    }
        ?>

<?php require_once("../includes/footer.php"); ?>