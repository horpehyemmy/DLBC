<?php
require_once("../includes/header.php");
require_once("../includes/config.php");
error_reporting(0);
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
    $region="";
    $group_of_district="";
    $new_language = "";
    $new_info="";
    if($_POST['area']){
      $region = $_POST['region'];
      $group_of_district=$_POST['group_of_district'];
    }else{
      echo"You need to select an area";
    }

    
    // For the option others in language
    $id=0;
    if ($_POST['language'] == '5') {
      $language = $_POST['language'];
      $language = $_POST['new_language'];


      if($_POST['new_language']){
        $querymode ="SELECT id FROM languages WHERE name ='$language'";
        $resultmode = mysqli_query($db,$querymode);
        $arraymode = mysqli_num_rows($resultmode);
        $fetch = mysqli_fetch_array($resultmode);
        
        if($arraymode > 0){
          $id=$fetch[0];
        }else{
          $query = "INSERT INTO languages(name)values('".$language."')";
          $resultlang = mysqli_query($db,$query);
          $id = mysqli_insert_id($db);

        }
      }
    }else {
     $language = $_POST['language'];
     $id=$language;
      // $language = $_POST['new_language'];

    }

    $info_id=0;
    if ($_POST['info'] == '6') {
      $info = $_POST['info'];
      $info = $_POST['new_info'];


      if($_POST['new_info']){
        $querymode ="SELECT id FROM info_media WHERE name ='$info'";
        $resultmode = mysqli_query($db,$querymode);
        $arraymode = mysqli_num_rows($resultmode);
        $fetch = mysqli_fetch_array($resultmode);

        
        if($arraymode > 0){
          $info_id=$fetch[0];
        }else{
          $query = "INSERT INTO info_media(name)values('".$info."')";
          $resultinfo= mysqli_query($db,$query);
          $info_id = mysqli_insert_id($db);

        }
      }
    }else {
     $info = $_POST['info'];
     $info_id=$info;
      // $info = $_POST['new_info'];

    }

    $selectuser= "SELECT * FROM applicant where first_name='$first_name'";
    $resultuser = mysqli_query($db,$selectuser);
    $result_array=mysqli_num_rows($resultuser);
    if($result_array > 0){
      echo "First name already exist";
    }else{

      $insert="INSERT INTO applicant(title,first_name,last_name,gender,status_id,place_of_work,age,tel_number,residential_address,area_id,group_of_district,region_id,lang_id,info_media_id) 
                        values('".$title."','".$first_name."','".$last_name."','".$gender."','".$status."','".$place_of_work."','".$age."','".$phone_no."','".$address."','".$area."','".$group_of_district."','".$region."','".$id."','".$info_id."')";
     // die($insert);
      $query = mysqli_query($db,$insert);
      // echo var_dump($query);
      // die($insert);
      if($query){
        $error= "Registration was successful";
      }else {
      echo "You have not filled the form";
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
	 <select name="title" required>
    <option value="">title</option>
    <option value="Mr">Mr</option>
    <option value="Mrs">Mrs</option>
    <option value="Miss">Miss</option>
  </select>
  <br>
  <br>
  First Name:
  <input type="text" class="fill" id="first_name" name="first_name" value="" required/>
  <br />
  <br>
   Last Name:
  <input type="text" id="last_name" class="fill" name="last_name" value="" required/>
  <br>
  Gender:
  <select name="gender" id="gender" value="" required/>
  	<option value="gender">gender<br></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
 <br>
 <br>
  Status:
	 <select name="status" id="status" name="status" class="fill" value="" required/>

<?php
	$query_status="SELECT * FROM status";

	$result_status=mysqli_query($db,$query_status ); 
	
	while ($resource_status=mysqli_fetch_array($result_status)) {
		echo "<option value=\"{$resource_status['id']}\">{$resource_status['name']}</option>";
		
		$resource_status++;
		}
		?>
  </select>
 <br>
 <br>
 Place of Work:
  <input type="text" id="place_of_work" name="place_of_work" class="fill" value="" required/>
  <br>
  Age:
  <input type="number" id="age" name="age" class="fill" value="" required/>
  <br>
 
  <br>
  Telephone Number:
  +234<input type="text" id="phone_no" name="phone_no" class="fill" value="" required/>
  <br>
  Residential Address:
 <input type="text" id="address" name="address" class="fill" value=""required/>
  <br>
  Residential Area:
  <select name="area" onchange="showUser(this.value)" id="area" value=""/>
    <option value="Area">Select an area<br></option>

<?php
  $query_area="SELECT * FROM area";

  $result_area=mysqli_query($db,$query_area ); 
  
  while ($resource_area=mysqli_fetch_array($result_area)) {
    echo "<option value=\"{$resource_area['id']}\">{$resource_area['name']}</option>";
    $resource_area++;
    }
    
    ?>
  </select>
  <br>
  <br>
  <div id="txtHint"><b>The group of district and region of residence will be shown here...</b></div>
 
  <br>
 
  Languages:
<select name="language" id="language"  class="fill" onChange="languagecatOnchange();" />
    <option selected="selected" >Please select ...</option>

<?php
  $query_language="SELECT * FROM languages where id<=5";

  $result_language=mysqli_query($db,$query_language); 
  
  while ($resource_language=mysqli_fetch_array($result_language)) {
     echo "<option value=\"{$resource_language['id']}\"> {$resource_language['name']}</option>";
    }
    ?>
  </select>
  <input type="text" name="new_language" class="fill" id="new_language" style="display:none;">
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
  <input type="text" name="new_info" class="fill" id="new_info" style="display:none;">
<br>
  <br> 
  <input id="submit" type="submit" class="fill" name="submit" onclick="checkForm" />
</form>

 <?php
require_once("../includes/footer.php");

?>