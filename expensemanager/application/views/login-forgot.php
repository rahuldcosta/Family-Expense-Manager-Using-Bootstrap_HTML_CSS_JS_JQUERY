<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/passreset/passwordreset.css" />
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
     <script type="text/javascript">
     $(document).ready(function () {
$('form').submit(function(e){

    e.preventDefault();
    
    if(atLeastOneRadio())
    {
         document.getElementById('typeerror').innerHTML="Select Type";
         document.getElementById('typeerror').setAttribute('style','color:black');
         inputText=document.getElementById('email');
         var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
         
    if(inputText.value.match(mailformat))  
    {    document.getElementById('emailerr').innerHTML="";
    $('form').unbind('submit').submit();
    }
    else
    {
        
         document.getElementById('emailerr').innerHTML="Invalid Email";
    }
         
    }
    else
    {
        document.getElementById('typeerror').innerHTML="Type Not Selected";
        document.getElementById('typeerror').setAttribute('style','color:red');
    }

});

});


function atLeastOneRadio() {
    return ($('input[type=radio]:checked').size() > 0);
}
     
     
     </script>
</head>
<body>
    <div id="Maincontainer" class="container"> 
    
    <div id="TopBar" class="row text-center" >
       <span   style="float: left;position: relative;top:1em;margin-left: 0.5em" >
        <i class="fa fa-home" style="color:red;font-weight:bold;"></i>
        <span style="font-weight:bold;cursor:pointer" onclick="location.href='<?php echo site_url(''); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">Home</span>
         </span>
       
        <span style="font-weight: bold;margin-left: -3em;position: relative;top:1em">Password Reset</span>
    </div>
    <div id="MiddleBar">
       <div class="container">
        <form class="form-horizontal " method="post" id="form" action="<?php echo site_url("logincontroller/doforget"); ?>">
            <fieldset>
                <div class="form-group">
                    <div class="text-center row" style="margin-bottom: 1em">
                        <div class=" text-center col-md-5"> <label  id ="typeerror"  class=" control-label" >Select Type</label></div>
                        <div class=" text-center col-md-7 extra"><input class="box" name=table type="radio"  value="customer" >Customer
                                        <input class="box" name=table type="radio"  value="vendor">Vendor</div>
                         
                   
                                        </div>
                    
                    <label class="col-md-4 control-label" for="textinput">Enter Email</label>  
                    <div class="col-md-4">
                        <input required id="email" name="email" type="text" placeholder="Your Email" class="form-control input-md">
                       <label class=" control-label" id="emailerr" style="color:red"></label>  
                    </div>
                     <?php echo form_error('email'); ?>
                </div>

                <!-- Button -->
                <div class="form-group">
                    
                    <div class="col-md-12">
                        <button id="emailreset" name="emailreset" class="submit btn btn-primary">Reset Password</button>
                    </div>
                </div>

                <!-- Test -->
                <div class="form-group text-center" style="word-wrap: break-word">
                   
                        <?php if( isset($info)): ?>
					<div class="alert alert-success">
						<?php echo($info) ?>
					</div>
				<?php elseif( isset($error)): ?>
					<div class="alert alert-error">
						<?php echo($error) ?>
					</div>
				<?php endif; ?>
                </div>
            </fieldset>
        </form>
       </div>
    </div>
   
</div>
</body>
</html>
