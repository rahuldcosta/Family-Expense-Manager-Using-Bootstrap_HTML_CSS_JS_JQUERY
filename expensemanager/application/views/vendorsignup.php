<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration Form</title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vsignup/Vendorsignup.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/Vendorsignup.js"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);
        var status1;
        $(document).ready(function () {
  //your code here

$('form').submit(function(e){

    e.preventDefault();

    ValidateEmail(document.vform.emailtxt); // to validate email and check if its unique or not
    

    

});

});
    
   
        
        var status="";
  function ValidateEmail(inputText)  
{
    
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(inputText.value.match(mailformat))  

{

            
document.vform.emailtxt.focus();

var user_name = $("input#emailtxt").val();
var fname= $("input#contact").val();

jQuery.ajax({
type: "POST",

url: "<?php echo site_url("vendorsignupcontroller/uniqueemail") ?>",
dataType: 'json',
data: {uname: user_name,f_name:fname},
success: function(res) {
   
if (res)
{   
    
    status=res.text;
    fstat=res.ftext;
    if(status=="true") 
    {
       
        document.getElementById('emailerror').innerHTML=' Email id already used enter different emailid';
        
    }
    else 
    {  
     document.getElementById('emailerror').innerHTML=' ';
    
        //error text for contact number
    if(fstat=="true")
    {
       
        document.getElementById('contactnolb').innerHTML=' contact number already registered';
        status1=false;
    }
    else 
    {
        document.getElementById('contactnolb').innerHTML='';
        var a=document.getElementById('passwordtxt').value;
        var b=document.getElementById('cnfpasswordtxt').value;
        
      if(a!=b){
          document.getElementById("errordiv1").innerHTML="Confirm password and Password entries dont match"+" Please enter same values";
      }
      
      else{
        document.getElementById("errordiv1").innerHTML=" ";
      if(document.getElementById("locationbutt").innerHTML=="Set Location:-")
      {
          document.getElementById("errordiv").innerHTML="Location Not Set";
          
          
      }
      else if(document.getElementById("locationbutt").innerHTML=="No results found")
      {
          document.getElementById("errordiv").innerHTML="No results found"+" Please Select another Location";
         
      }
     
         else if (status=="false" && fstat=="false"  )
      {
           $('form').unbind('submit').submit();
    
      }
          }
        
        
        
                }  
       
        
   
      
  }
   


}
 
}




});
    
 
 
}  
else  
{  
   
document.getElementById('emailerror').innerHTML=' is invalid';
document.vform.emailtxt.focus();  
status1=false;  
}  
}

    </script>
</head>

<body>
	<div class="container">
        <div id="header"><h2>Vendor SignUp</h2>
        </div>
            <form name="vform" class="form-horizontal" method="post" action="vendorsignupcontroller/tindex">
<fieldset>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="lastnametxt"></label>  
  <div class="col-md-4">
      <input id="vendorname" name="vendorname" type="text" placeholder="Vendor Name"  onfocus="this.placeholder=''" onblur="this.placeholder='Vendor Name'" class="form-control input-md" required="">
      <p></p>
     <label id="contactnolb"   style="width:100%;margin:auto;color:red">  </label> 
     <input minlength="10" id="contact" name="contacttxt" type="text" placeholder="Main Branch Contact No"  onfocus="this.placeholder=''" onblur="this.placeholder='Contact'" class="form-control input-md" required=""> 
     
  </div>

</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="dobtxt"></label>
  <div class="col-md-4">
  <input id="dobtxt" name="dobtxt" type="text" placeholder="Date of Establishment" class="form-control input-md"  onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Bussiness Start Date" required="">
  </div>
</div>






<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailtxt"><label id="emailerror" style="color:red"></label></label>
  <div class="col-md-4">
  <input id="emailtxt" name="emailtxt" type="text" placeholder="E-mail"  onfocus="this.placeholder=''" onblur="this.placeholder='E-mail'" class="form-control input-md" required="">
  </div>
</div>
    


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordtxt"></label>  
  <div class="col-md-4">
      <input id="passwordtxt" name="passwordtxt" type="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordtxt"></label>  
  <div class="col-md-4">
  <input id="cnfpasswordtxt"  type="password" placeholder="Confirm Password" onfocus="this.placeholder=''" onblur="this.placeholder='Confirm Password'" class="form-control input-md" required="">
  <label id="errordiv1" style="color:red;font-size:0.8em;margin-left: 0.5em"></label>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="locationbutt"> For Main Branch</label>
  <div class="col-md-4">
      <button id="locationbutt" name="locationbutt" class="btn btn-primary" disabled onclick="">Set Location:-</button>
      <label id="errordiv" style="color:red;font-size:0.8em;margin-left: 0.5em"></label>
  </div>
</div>
    
<div id="mapcontainer" class="form-group">
    <div class="col-md-4"></div>
     <div class="col-md-4">
         <input type="hidden" id="city" name="citytxt">
         <input type="hidden" id="state" name="statetxt">
         <input type="hidden" id="country" name="countrytxt">
         <div id="googleMap" class="style3"></div>
    </div>
</div>
    

<div class="form-group">
  <label class="col-md-4 control-label" for="signuptxt"></label>
  <div class="col-md-4">
      <button id="signuptxt" name="signuptxt" class="btn btn-primary"  >Sign Up</button>
    </div>
</div>
</fieldset>
</form>
	</div>
</body>
</html>