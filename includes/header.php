<!DOCTYPE HTML>
<html>
<head>
  <title>Deeper Christain Life Ministry</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="stylesheets/styling.css" title="style" />

  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        // dom: 'Bfrtip',
        dom:"<'row am-datatable-header'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4 text-right'frt>><'row am-datatable-body'<'col-sm-12'tr>><'row am-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            'copy', 'excel', 'pdf', 'print','csv'
        ]
      });
    });
  </script>

  <script>
  function showUser(str) {
    if (str=="") {
      document.getElementById("txtHint").innerHTML="";
      return;
    }

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("txtHint").innerHTML=this.responseText;
      }
    }
    
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
</script>
<script type="text/javascript" src="9lessons.js"></script>
<script type="text/javascript">
  // var check_title =/^[a-zA-Z]$/;
  // var check_first_name=/^[a-zA-Z]{4,15}$/;
  // var check_last_name=/^[a-zA-Z]{4,15}$/;
  // var check_gender=/^[a-zA-Z]$/;
  // var check_status=/^[a-zA-Z]$/;
  // var check_place_of_work=/^[a-zA-Z0-9 ,/]{2,150}$/;
  // var check_age=/^[0-9]{1,2}$/;
  // var check_phone_no=/^[0-9]{9,11}$/;
  // var check_address=/^[a-zA-Z0-9 ,/]{2,150}$/;
  var check_area=/^[a-zA-Z -,/]{10,150}$/;
  var check_district=/^[a-zA-Z -,/]{10,150}$/;
  var check_region=/^[a-zA-Z -,/]{10,150}$/;
  var check_language=/^[a-zA-Z -,/]{2,150}$/;
  var check_new_language=/^[a-zA-Z -,/]{2,150}$/;
  var check_info=/^[a-zA-Z -,/]{2,150}$/;
  var check_new_info=/^[a-zA-Z -,/]{2,150}$/;

  function validate(form){
    // confirm("You need to fill in the details of the form before submitting,Click OK and fill in your details ")

    // var title = form.title.value;
    // var first_name = form.first_name.value;
    // var last_name = form.last_name.value;
    // var gender = form.gender.value;
    // var status = form.status.value;
    // var place_of_work = form.place_of_work.value;
    // var age = form.age.value;
    // var phone_no = form.phone_no.value;
    // var address = form.address.value;
    var area = form.area.value;
    var group_of_district = form.group_of_district.value;
    var region= form.region.value;
    var language = form.language.value;
    var new_language = form.new_language.value;
    var info = form.info.value;
    var new_info = form.new_info.value;
    var errors = [];
    // if (title ==0) {
    //   errors[errors.length] = "Select title.";
    // }

    // if (!check_first_name.test(first_name)) {
    //   errors[errors.length] = "Enter a valid first Name .";
    // }

    // if (!check_last_name.test(last_name)) {
    //   errors[errors.length] = "You must enter a valid last name.";
    // }

    // if (gender ==0) {
    //   errors[errors.length] = "Select gender.";
    // }

    // if (status == 0) {
    //   errors[errors.length] = "Select status.";
    // }

    // if (!check_place_of_work.test(place_of_work)) {
    //   errors[errors.length] = "You must enter a valid address for your place of work.";
    // }

    // if (!check_age.test(age)) {
    //   errors[errors.length] = "You must enter a valid age.";
    // }

    // if (!check_phone_no.test(phone_no)) {
    //   errors[errors.length] = "You must enter a valid phone number.";
    // }

    // if (!check_address.test(address)) {
    //   errors[errors.length] = "You must enter a valid residential address.";
    // }
    if (area ==0 && !check_district.test(group_of_district) && !check_region.test(region)) {
      errors[errors.length] = "You must enter a valid area.";
    }


    if (language == 0) {
      errors[errors.length] = "You must choose a language.";
    }

    if (info ==0) {
      errors[errors.length] = "You must enter a valid info media.";
    }

    if(language == '5' && !check_new_language.test(new_language)){
      errors[errors.length] = "You must specify the language";
    }

    if(info == '6' && !check_new_info.test(new_info)){
      errors[errors.length] = "You must specify the info";
    }

    if (errors.length > 0) {
      reportErrors(errors);
      return false;
    }else{
      return true;
    }
  }

  function reportErrors(errors){
   var msg = "Please Enter Valid Data...\n";
   for (var i = 0; i<errors.length; i++) {
    var numError = i + 1;
    msg += "\n" + numError + ". " + errors[i];
   }
   alert(msg);
  }

  function languagecatOnchange(){
    var lang_cat = document.getElementById('language').value 
    if(lang_cat == "5")
      document.getElementById("new_language").style.display="block";
    else
      document.getElementById("new_language").style.display="none";
  }

  function infocatOnchange(){
    var lang_cat = document.getElementById('info').value 
    if(lang_cat == "6")
      document.getElementById("new_info").style.display="block";
    else
      document.getElementById("new_info").style.display="none";
  }
</script> 
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
       <a href="index.php"><img src="images/logo.png" /></a>
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <!-- <h1><a href="dlbc.php">Deeper Christian Life Ministry</a></h1> -->
          <!-- <h2>Simple. Contemporary. Website Template.</h2> -->
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="#">About US</a></li>
          <li><a href="register.php">Registration</a></li>
          <!-- <li><a href="another_page.html">Another Page</a></li> -->
          <li><a href="#">Contact Us</a></li>
           <li><a href="adminlogin.php">Admin Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">