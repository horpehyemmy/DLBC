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
<!-- <script type="text/javascript" src="9lessons.js"></script> -->
<script type="text/javascript">
  var check_title =/^[a-zA-Z]$/;
  var check_first_name=/^[a-zA-Z]{4,15}$/;
  var check_last_name=/^[a-zA-Z]{4,15}$/;
  var check_gender=/^[a-zA-Z]$/;
  var check_status=/^[a-zA-Z]$/;
  var check_place_of_work=/^[a-zA-Z0-9 ,/]{2,150}$/;
  var check_age=/^[0-9]{1,2}$/;
  var check_phone_no=/^[0-9]{9,11}$/;
  var check_address=/^[a-zA-Z0-9 ,/]{2,150}$/;
  var check_area=/^[a-zA-Z -,/]{10,150}$/;
  var check_language=/^[a-zA-Z -,/]{2,150}$/;
  var check_new_language=/^[a-zA-Z -,/]{2,150}$/;
  var check_info=/^[a-zA-Z]{5,30}$/;

  function validate(form){
    var title = form.title.value;
    var first_name = form.first_name.value;
    var last_name = form.last_name.value;
    var gender = form.gender.value;
    var status = form.status.value;
    var place_of_work = form.place_of_work.value;
    var age = form.age.value;
    var phone_no = form.phone_no.value;
    var address = form.address.value;
    var area = form.area.value;
    var language = form.language.value;
    var new_language = form.new_language.value;
    var info = form.info.value;

    var errors = [];
    if (title ==0) {
      errors[errors.length] = "Select title.";
    }

    if (!check_first_name.test(first_name)) {
      errors[errors.length] = "Enter a valid Name .";
    }

    if (!check_last_name.test(last_name)) {
      errors[errors.length] = "You must enter a valid name.";
    }

    if (gender ==0) {
      errors[errors.length] = "Select gender.";
    }

    if (status == 0) {
      errors[errors.length] = "Select status.";
    }

    if (!check_place_of_work.test(place_of_work)) {
      errors[errors.length] = "You must enter a valid address.";
    }

    if (!check_age.test(age)) {
      errors[errors.length] = "You must enter a valid age.";
    }

    if (!check_phone_no.test(phone_no)) {
      errors[errors.length] = "You must enter a valid phone number.";
    }

    if (!check_address.test(address)) {
      errors[errors.length] = "You must enter a valid address.";
    }

    if (area ==0) {
      errors[errors.length] = "You must enter a valid area.";
    }

    if (language == 0) {
      errors[errors.length] = "You must choose a language.";
    }

    if (info ==0) {
      errors[errors.length] = "You must enter a valid info media.";
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
    if(lang_cat == "Others")
      document.getElementById("new_language").style.display="block";
    else
      document.getElementById("new_language").style.display="none";
  }

  function infocatOnchange(){
    var lang_cat = document.getElementById('info').value 
    if(lang_cat == "others")
      document.getElementById("new_info").style.display="block";
    else
      document.getElementById("new_info").style.display="none";
  }
</script> 