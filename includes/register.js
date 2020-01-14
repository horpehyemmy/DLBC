function first_name(){
  var first_name=/^[a-zA-Z]{4,15}$/;
  if(document.form.first_name.value.search(first_name)==-1){
    alert("Please Enter a valid  first name");
    document.form.first_name.focus();
    return false;
  }
} 
   
function last_name(){
  var last_name=/^[a-zA-Z]{4,15}$/;
  if(document.form.last_name.value.search(last_name)==-1){
   alert("Please Enter a valid last name");
   document.form.last_name.focus();
   return false;
  }
} 

function gender(){
  var gender=/^[a-zA-Z]$/;
  if(document.form.gender.value.search(gender)==-1){
   alert("Please select a gender");
   document.form.gender.focus();
   return false;
  }
}

function status(){
  var status=/^[a-zA-Z]$/;
  if(document.form.status.value.search(status)==-1){
   alert("Please select");
   document.form.status.focus();
   return false;
  }
}  


function place_of_work(){
  var place_of_work=/^[a-zA-Z0-9 ,/]{10,150}$/;
  if(document.form.place_of_work.value.search(place_of_work)==-1){
   alert("Please enter correct address");
   document.form.place_of_work.focus();
   return false;
  }
}

function age(){
  var age=/^[0-9]{1,2}$/;
  if(document.form.age.value.search(age)==-1){
   alert("Please enter correct age");
   document.form.age.focus();
   return false;
  }
}

 function phone_no(){
  var phone_no=/^[0-9]{9,11}$/;
  if(document.form.phone_no.value.search(phone_no)==-1)
    {
   alert("enter correct phone no");
   document.form.phone_no.focus();
   return false;
   }
   }
function address(){
  var address=/^[a-zA-Z0-9 ,/]{10,150}$/;
  if(document.form.address.value.search(address)==-1){
   alert("Please enter correct address");
   document.form.address.focus();
   return false;
  }
}
function area(){
  var area=/^[a-zA-Z -,/]{10,150}$/;
  if(document.form.area.value.search(area)==-1){
   alert("Please select an area");
   document.form.area.focus();
   return false;
  }
}

function language(){
  var language=/^[a-zA-Z -,/]{10,150}$/;
  if(document.form.`language`.value.search(language)==-1){
   alert("Please select a language");
   document.form.`language`.focus();
   return false;
  }
}

function info(){
   var info=/^[a-zA-Z]{5,30}$/;
   if(document.form.`info`.value.search(info)==-1)
    {
   alert("Please select");
   document.form.`info`.focus();
   return false;
   }



function validate(){
  var first_name=/^[a-zA-Z]{4,15}$/;
  var last_name=/^[a-zA-Z]{4,15}$/;
  var gender=/^[a-zA-Z]$/;
  var status=/^[a-zA-Z]$/;
  var place_of_work=/^[a-zA-Z0-9 ,/]{10,150}$/;
  var age=/^[0-9]{1,2}$/;
  var phone_no=/^[0-9]{9,11}$/;
  var address=/^[a-zA-Z0-9 ,/]{10,150}$/;
  var area=/^[a-zA-Z -,/]{10,150}$/;
  var language=/^[a-zA-Z -,/]{10,150}$/;
  var info=/^[a-zA-Z]{5,30}$/;
  
    
  
  if(document.form.first_name.value.search(first_name)==-1){
    alert("Please Enter a valid  first name");
    document.form.first_name.focus();
    return false;
  }else if(document.form.last_name.value.search(last_name)==-1){
    alert("Please Enter a valid last name");
    document.form.last_name.focus();
    return false;
  }else if(document.form.gender.value.search(gender)==-1){
    alert("Please select a gender");
    document.form.gender.focus();
    return false;
  }else if(document.form.status.value.search(status)==-1){
    alert("Please select");
    document.form.status.focus();
    return false;
  }else if(document.form.place_of_work.value.search(place_of_work)==-1){
    alert("Please enter correct address");
    document.form.place_of_work.focus();
    return false;
  }else if(document.form.age.value.search(age)==-1){
     alert("Please enter correct age");
     document.form.age.focus();
     return false;
  }else if(document.form.phone_no.value.search(phone_no)==-1){
    alert("enter correct phone no");
    document.form.phone_no.focus();
    return false;
  }else if(document.form.address.value.search(address)==-1){
    alert("Please enter correct address");
    document.form.address.focus();
    return false;
    }
  }else if(document.form.area.value.search(area)==-1){
    alert("Please select an area");
    document.form.area.focus();
    return false;
  }else if(document.form.`language`.value.search(language)==-1){
    alert("Please select a language");
    document.form.`language`.focus();
    return false;
  }else if(document.form.`info`.value.search(info)==-1){
    alert("Please select");
    document.form.`info`.focus();
    return false;
  }else {
    return true;
  }
}
