<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration Form</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/customersignup/customersignup.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/customersignup/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/customersignup/bootstrap-theme.min.css" />
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="<?php echo base_url(); ?>assets/customersignup/customersignup.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script>
        var status1;
        google.maps.event.addDomListener(window, 'load', initialize);
        $(document).ready(function () {
  //your code here

$('form').submit(function(e){

    e.preventDefault();
//alert('sucess');
    // Cycle through each Attendee Name
    ValidateEmail(document.cusform.emailtxt);
    

    

});

});


 function ValidateEmail(inputText)  
{
    
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(inputText.value.match(mailformat))  
{
 
document.cusform.emailtxt.focus();

var user_name = $("input#emailtxt").val();
var fname= $("input#newfamily").val();
jQuery.ajax({
type: "POST",

url: "<?php echo site_url("customersignupcontroller/uniqueemail") ?>",
dataType: 'json',
data: {uname: user_name,f_name:fname},
success: function(res) {
if (res)
{   
   // alert(res.text);
     status=res.text;
     fstat=res.ftext;
    if(status=="true")
    {
      
        document.getElementById('emailerror').innerHTML=' email id already used enter different emailid';
        
    }
    else 
    {  
      
       
    
        
        if(fstat=="true")
    {
      
        document.getElementById('familyerrror').innerHTML=' family name exists already';
        status1=false;
    }
    else 
    {
       
         var a=document.getElementById('passwordtxt').value;
        var b=document.getElementById('cnfpasswordtxt').value;
        
      if(a!=b){
          document.getElementById("errordiv12").innerHTML="Confirm password and Password entries dont match"+" Please enter same values";
      }
      else if(document.getElementById("locationbutt").innerHTML=="Set Location:-")
      {
          document.getElementById("errordiv12").innerHTML="";
          document.getElementById("errordiv").innerHTML="Location Not Set";
          
      }
      else if(document.getElementById("locationbutt").innerHTML=="No results found")
      {
          document.getElementById("errordiv").innerHTML="No results found"+" Please Select another Location";
         
      }
      else
      {
           $('form').unbind('submit').submit();
    
      }
      
        
        
        
        
                }  
        
        
       // document.cusform.action = 'customersignupcontroller/submitcustomerdata';
     
      
    }
   
// Show Entered Valuefailed login please check username and password
//alert("Success User Found"+res.username + '||' + res.password );

}
 
}




});
    
 
 
}  
else  
{  
document.getElementById('emailerror').innerHTML=' is invalid';
document.cusform.emailtxt.focus();  
status1=false;  
}  
}
    </script>
</head>

<body onload="onload()">
	<div class="container">
        <div id="header"><h2>Customer SignUp</h2>
        </div>
            <form name="cusform"class="form-horizontal" method="post" action = 'customersignupcontroller/submitcustomerdata' >
<fieldset>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="lastnametxt">Name</label>  
  <div class="col-md-4">
      <input id="firstnametxt" name="firstnametxt" type="text" placeholder="First Name" class="form-control input-md" required="">
      <p></p>
      <input id="lastnametxt" name="lastnametxt" type="text" placeholder="Last Name" class="form-control input-md" required=""> 
  </div>

</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="emailtxt">Email <label id="emailerror" style="color:red"></label></label>
  <div class="col-md-4">
  <input id="emailtxt" name="emailtxt" type="text" placeholder="e-mail" class="form-control input-md" required="">
  </div>
</div>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="dobtxt">Date of Birth</label>
  <div class="col-md-4">
  <input id="dobtxt" name="dobtxt" type="text" placeholder="Date of Birth" class="form-control input-md"  onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tap To Set Birthdate" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordtxt">Password</label>  
  <div class="col-md-4">
      <input id="passwordtxt" name="passwordtxt" type="password" placeholder="Password" class="form-control input-md" required="">
  <label id="errordiv12" style="color:red;font-size:0.8em;margin-left: 0.5em"></label>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="passwordtxt">Confirm Password</label>  
  <div class="col-md-4">
  <input id="cnfpasswordtxt"  type="password" placeholder="Confirm Password" onfocus="this.placeholder=''" onblur="this.placeholder='Confirm Password'" class="form-control input-md" required="">
  <label id="errordiv1" style="color:red;font-size:0.8em;margin-left: 0.5em"></label>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="locationbutt"></label>
  <div class="col-md-12 text-center">
      <button id="locationbutt" name="locationbutt" class="btn btn-primary" disabled>Set Location:-</button>
      <label id="errordiv" style="color:red;font-size:0.8em;margin-left: 0.5em"></label>
    <input id="country" type="hidden" name="country" value=""  />
    <input id="state" type="hidden" name="state" value="" />
    <input id="location" type="hidden" name="location" value="" />
  </div>
</div>
    
<div id="mapcontainer" class="form-group">
    <div class="col-md-4"></div>
     <div class="col-md-4">
         <div id="googleMap" class="style3"></div>
    </div>
</div>
    
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="CustomerType">Customer Type</label>
  <div class="col-md-4">
      
  <div class="radio">
    <label for="CustomerType-2">
        <input required type="radio" name="CustomerType" id="CustomerType-0" value="1" onchange="document.getElementById('newfamily').setAttribute('required','');  newfamilyselect()"  />
      <span>Family Head  <label id="familyerrror" style="color:red"></label></span>
    </label>
  </div>
  <div id="newfamilygrp" class="group row">
    <label class="style2 control-label" for="familydetaillbl1"><span class="style1">Enter Unique Name</span></label>  
    <div class="style2">
        <input id="newfamily" name="familynamenew" type="text" placeholder="Family Name" class="form-control input-md" value="" />
    </div>
  </div>
  <div class="radio">
    <label for="CustomerType-3">
      <input required type="radio" name="CustomerType" id="CustomerType-1" value="2" onchange="document.getElementById('oldfamilynames').setAttribute('required',''); existingfamilyselect()" />
      <span>Family Member</span>
    </label>
  </div>
  <div id="existingfamilygrp" class="group row">
    <label class="style2 control-label" for="familydetaillbl2"><span class="style1">Select Name From List</span></label>  
    <div class="style2">
        <select  id="oldfamilynames"class="btn btn-default dropdown-toggle" name="familynameeold" >
            
             <?php 
                    foreach ($fdata as $row)
{   ?>
            <option value="<?php echo $row['family_name'] ?>"><?php echo $row['family_name'] ?></option>
                                    
        <?php                           }   ?>
                                           


</select>
        <input id="existingfamily" style="display:none" type="text" placeholder="Family Name" class="form-control input-md" value="" />
    </div>
  </div>
  </div>
</div>
<div class="form-group">
 
  <div class="col-md-12" style="text-align: center">
      <button id="signuptxt"  value="Submit" type="submit"  class="btn btn-primary" onclick="">Sign Up</button>
  </div>
</div>
</fieldset>
</form>
	</div>
</body>
</html>
