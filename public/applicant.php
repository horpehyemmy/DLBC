<?php
require_once("../includes/header.php");
require_once("../includes/config.php");
?>
<h3 id="list">LIST OF APPLICANTS</h3>
<table id="example" class="display" width="100%" cellspacing="0">	
	<thead>
	<tr>
		<th>S/N</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Place of Work</th>
		<th>Age</th>
		<th>Telephone number</th>
		<th>Residential Address</th>
		<th>Area</th>
		<th>District</th>
		<th>Region</th>
		<th>Language</th>
		<th>Info media</th>
	</tr>
	</thead>
	<tbody>
	<?php

	$query = "SELECT applicant.id,applicant.title,applicant.first_name,applicant.last_name,applicant.gender,status.name AS status,applicant.place_of_work,applicant.age,applicant.tel_number,applicant.residential_address,area.name AS area,applicant.group_of_district AS district,applicant.region_id AS region,languages.name AS lang,info_media.name AS info FROM applicant 
				join area ON area.id = applicant.area_id
				join status ON status.id = applicant.status_id
				join languages ON languages.id =applicant.lang_id
				JOIN info_media ON info_media.id =applicant.info_media_id
				ORDER BY first_name ASC";
	$result = mysqli_query($db,$query);
	$counter = 0;
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . (++$counter) . "</td>";
		echo "<td>".$row['title']." ".$row['first_name']." ".$row['last_name']."</td>";
		echo "<td>".$row['gender']."</td>";
		echo "<td>".$row['status']."</td>";
		echo "<td>".$row['place_of_work']."</td>";
		echo "<td>".$row['age']."</td>";
		echo "<td>".$row['tel_number']."</td>";
		echo "<td>".$row['residential_address']."</td>";
		echo "<td>".$row['area']."</td>";
		echo "<td>".$row['district']."</td>";
		echo "<td>".$row['region']."</td>";
		echo "<td>".$row['lang']."</td>";
		echo "<td>".$row['info']."</td>";
		echo "</tr>";
	}
	?>
	</tbody>
</table>

<?php require_once("../includes/footer.php"); ?>