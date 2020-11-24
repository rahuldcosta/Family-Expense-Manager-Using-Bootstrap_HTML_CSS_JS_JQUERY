<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Profile Edit</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cprofileedit/customersignup.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/cprofileedit/Expense.css">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="<?php echo base_url(); ?>assets/js/customerprofileedit.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
   
</head>

 <body  >
  	

<div id="Maincontainer" class="container "  > 
    
    
    
    
    
<?php $this->load->view('vendorslidermenu',$mega);?>
    
    
    
    
<div id="TopBar" class="row text-center" >
 <div id="TopBar" class="row text-center">
        <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)">
        </span>
        <span id="Add_Expense" style="font-size:1.2em" >
            Update Profile
        </span>
        
    </div>


</div>

     <form name="cprofileform"class="form-horizontal" method="post" action = 'submiteditprofile' >

<fieldset>
    <?php foreach($mydata as $row ) {?>
 <div id="MiddleBar" class="row"  style="margin-top:1.9em;margin-bottom: 0.7em;border-radius:20px" >   
<div class="form-group">
  <label class="col-md-4 control-label" for="lastnametxt">Name</label>  
  <div class="col-md-4">
      <input id="firstnametxt" name="firstnametxt" type="text"  class="form-control input-md" required value="<?php echo $row['vendorname'];?>">
      <p></p>
     
  </div>

</div>

<!-- Text input-->

    
<div class="form-group">
  <label class="col-md-4 control-label" for="dobtxt">Established On:-</label>
  <div class="col-md-4">
  <input id="dobtxt" name="dobtxt" type="text"  class="form-control input-md"  onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tap To Set Date" required="" value="<?php echo $row['date'];?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordtxt">Password</label>  
  <div class="col-md-4">
      <input id="passwordtxt" name="passwordtxt" type="password" placeholder="Password" class="form-control input-md" required="" value="<?php echo base64_decode ($row['password']);?>">
  </div>
</div>



<!-- Button -->



</div>
    <?php }?>
</fieldset>
  
    
    
    <div id="errormsg" class="text-center" style=" color:red"></div>
  













    

    <div id="BottomBar" class="row text-center"  >
    
  <div  class="text-center myborder" style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);" >
    <span class="glyphicon glyphicon-header text-center"></span>
</div>
   
    
<button  type="submit" id="submitter" class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" >
        <span class="glyphicon glyphicon-check" style="background:white;color:black;border-radius: 25px;font-size:1.6em">
            
        </span>
    </button>


<div  class="text-center myborder" style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);" >

<span class="glyphicon glyphicon-pencil text-center" style="border-radius: 25px;"></span>

</div>

 
</div>





</form>
</div>




</body>
</html>
