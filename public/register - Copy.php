<?php
require_once("../includes/header.php");
require_once("../includes/config.php");

?>
<?php
 if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $gender=$_POST['gender'];
    $status=$_POST['status'];
    $place_of_work=$_POST['place_of_work'];
    $age=$_POST['age'];
    $phone_no=$_POST['phone_no'];
    $address=$_POST['address'];
    $area=$_POST['area'];
    $region=$_POST['region'];
    $group_of_district=$_POST['group_of_district'];
    $new_language = "";
    $new_info="";
    // For the option others in language
    if ($_POST['language'] == '5') {
      $language = $_POST['language'];
      $new_language = $_POST['new_language'];

      if($_POST['new_language']){
        $querymode ="SELECT * FROM languages WHERE name ='$new_language'";
        $resultmode = mysqli_query($db,$querymode);
        $arraymode = mysqli_num_rows($resultmode);

        
        if($arraymode > 0){
         $queryignore= "INSERT IGNORE INTO languages (name) VALUES ('".$new_language."'), ('".$new_language."')";
         $resultignore = mysqli_query($db,$queryignore);
        }else{
          $query = "INSERT INTO languages(name)values('".$new_language."')";
          $resultlang = mysqli_query($db,$query);
        }
      }
    }else {
      $language = $_POST['language'];
      $new_language = $_POST['language'];
    }
    // for the others option in the info media option 
    if ($_POST['info'] == '6') {
      $info = $_POST['info'];
      $new_info = $_POST['new_info'];

      if($_POST['new_info']){
        $queryinfo ="SELECT * FROM info_media WHERE name ='$new_info'";
        $resultinfo= mysqli_query($db,$queryinfo);
        $arrayinfo = mysqli_num_rows($resultinfo);


        if($arrayinfo > 0){
          $queryignore= "INSERT IGNORE INTO info_media(name) VALUES ('".$new_info."'), ('".$new_info."')";
         $resultignore = mysqli_query($db,$queryignore);
        }else{
          $query = "INSERT INTO info_media(name)values('".$new_info."')";
          $resultinfo = mysqli_query($db,$query);
        }
      }
    }else {
      $info = $_POST['info'];
      $new_info = $_POST['info'];
    }

  
    $selectuser= "SELECT * FROM applicant where first_name='$first_name'";
    $resultuser = mysqli_query($db,$selectuser);
    $result_array=mysqli_num_rows($resultuser);
    if($result_array > 0){
      echo "First name already exist";
    }else{
      $insert="INSERT INTO applicant(title,first_name,last_name,gender,status_id,place_of_work,age,tel_number,residential_address,area_id,group_of_district,region_id,lang_id,new_lang,info_media_id,new_info_media) 
                        values('".$title."','".$first_name."','".$last_name."','".$gender."','".$status."','".$place_of_work."','".$age."','".$phone_no."','".$address."','".$area."','".$group_of_district."','".$region."','".$language."','".$new_language."','".$info."','".$new_info."')";
     
      $query = mysqli_query($db,$insert);
      
      if($query){
        $error= "Registration was successful";
      }else {
      echo "Registration not successful";
      }
    }
  }
?>
<form autocomplete="off"
  enctype="multipart/form-data" method="post" action="" onSubmit="return validate(this);" name="form">
  
<!-- <form action="" method="post" name="forma" onSubmit="return validate()"> -->
  <?php  global $error;
  echo $error ."<br>";?>
	Title:
	 <select name="title">
    <option value="">title</option>
    <option value="Mr">Mr</option>
    <option value="Mrs">Mrs</option>
    <option value="Miss">Miss</option>
  </select>
  <br>
  <br>
  First Name:
  <input type="text" id="first_name" name="first_name" value="" />
  <br />
  <br>
   Last Name:
  <input type="text" id="last_name" name="last_name" value=""/>
  <br>
  Gender:
  <select name="gender" id="gender" value=""/>
  	<option value="gender">gender<br></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
 <br>
 <br>
  Status:
	 <select name="status" id="status" name="status" value=""/>

<?php
	$query_status="SELECT * FROM status";

	$result_status=mysqli_query($db,$query_status ); 
	
	while ($resource_status=mysqli_fetch_array($result_status)) {
		echo "<option value=\"{$resource_status['id']}\">{$resource_status['name']}</option>";
		// echo "<button type="edit">"edit"</button>";
		$resource_status++;
		}
		?>
  </select>
 <br>
 <br>
 Place of Work:
  <input type="text" id="place_of_work" name="place_of_work" value=""/>
  <br>
  Age:
  <input type="number" id="age" name="age" value=""/>
  <br>
 
  <br>
  Telephone Number:
  +234<input type="text" id="phone_no" name="phone_no" value=""/>
  <br>
  Residential Address:
 <input type="text" id="address" name="address" value=""/>
  <br>
  Residential Area:
  <select name="area" onchange="showUser(this.value)" id="area" value=""/>
    <option value="Area">Select an area<br></option>

<?php
  $query_area="SELECT * FROM area";

  $result_area=mysqli_query($db,$query_area ); 
  
  while ($resource_area=mysqli_fetch_array($result_area)) {
    echo "<option value=\"{$resource_area['id']}\">{$resource_area['name']}</option>";
    // echo "<button type="edit">"edit"</button>";
    $resource_area++;
    }
    
    ?>
  </select>
  <br>
  <br>
  <div id="txtHint"><b>The group of district and region of residence will be shown here...</b></div>
 
  <br>
 
  Languages:
<select name="language" id="language" onChange="languagecatOnchange();"/>
    <option selected="selected" >Please select ...</option>

<?php
  $query_language="SELECT * FROM languages where id<=5";

  $result_language=mysqli_query($db,$query_language); 
  
  while ($resource_language=mysqli_fetch_array($result_language)) {
     echo "<option value=\"{$resource_language['id']}\"> {$resource_language['name']}</option>";
    }
    ?>
  </select>
  <input type="text" name="new_language" id="new_language" style="display:none;">
  <br>
  <br>
How did you hear about the programme?:


<div id="div1"></div>
<select name="info" id="info" onChange="infocatOnchange();">
    <option selected="selected">Please select ...</option>

<?php
	$query_info="SELECT * FROM info_media where id<=6";

	$result_info=mysqli_query($db,$query_info); 
	
	while ($resource_info=mysqli_fetch_array($result_info)) {
		echo "<option value=\"{$resource_info['id']}\">{$resource_info['name']}</option>";
		// echo "<button type="edit">"edit"</button>";

		$resource_info++;
		}
		?>
  </select>
  <input type="text" name="new_info" id="new_info" style="display:none;">
<br>
  <br> 
  <input id="submit" type="submit" name="submit" onclick="checkForm" />
</form>

 <?php
require_once("../includes/footer.php");

?>