<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)">
  <head>
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/updatebranch/customersignup.css" />
       <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Home.js"></script>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/updateoffer/Expense.css">
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="<?php echo base_url(); ?>assets/js/updatebranch.js"></script>
       <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        var status1;
        google.maps.event.addDomListener(window, 'load', initialize);
        
        $(document).ready(function () {
  //your code here

$('form').submit(function(e){  
    
    e.preventDefault();
    validateoffer(e);
    
    
    });

}); 
        
        
        
        
    function validateoffer(event)
    {
      //  document.forms['addexpense'].submit();
      //  action="addexpensecontroller/insertexpense"
    
          //label =>contactnolb
          
          ///////////////////////////////////////////////////////////
          
          var cno = $("input#contactno").val();
        
        if(/^[0-9]+$/.test(cno))
        { if(cno.length == 0)
        {
             document.getElementById("contactnolb").innerHTML="Enter 10 digit #";
             document.getElementById("contactnolb").style.color='red';
        }
        else if(cno.length<10)
        {
            document.getElementById("contactnolb").innerHTML="# Less than 10 digits";
            document.getElementById("contactnolb").style.color='red';
            
        }
        else {
            
            jQuery.ajax({
type: "POST",
url: " <?php echo site_url('managebranchcontroller/contactnochecker'); ?>",
dataType: 'json',
data: {cno: cno},
success: function(res) {
if (res.text)
{
   // alert('Very good uynique no');
   
// Show Entered Valuefailed login please check username and password
//alert("Success User Found"+res.username + '||' + res.password );
    document.getElementById("contactnolb").innerHTML="";
    st=true;
    
     
       
    
    
    
}
else if ($("input#contactno").val() == $("input#older").val()) {
     st=true;
}
else
{
    document.getElementById("contactnolb").innerHTML="# Already registered";
    document.getElementById("contactnolb").style.color='red';
    }
    
    
    if(document.getElementById("locationbutt").innerHTML=="Set Location:-")
      {
          document.getElementById("errordiv").innerHTML="Location Not Set";
          
      }
      else if(document.getElementById("locationbutt").innerHTML=="No results found")
      {
          document.getElementById("errordiv").innerHTML="No results found"+" Please Select another Location";
         
      }
      else
      {
      sf=true;
         if(st && sf)
        {
         $('form').unbind('submit').submit();
        }
      }
        
        
        

}

});
            
           //  document.getElementById("contactnolb").innerHTML="";
        }
        
        
        
         } 
        else
        {
            document.getElementById("contactnolb").innerHTML="Invalid No";
            document.getElementById("contactnolb").style.color='red';
        }
        
          
          
          
          
          
          ////////////////////////////////////////////////////////
           //$('form').unbind('submit').submit();
 
      
      
        
    
    }
    
    
    </script>
  </head>

  <body  >
  	

<div id="Maincontainer" class="container "  > 
    
    
    
    
    
<?php $this->load->view('vendorslidermenu',$mega);?>
    
    
    
    
<div id="TopBar" class="row text-center" >
 <div id="TopBar" class="row text-center">
        <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)">
        </span>
        <span id="Add_Expense" style="font-size:1.2em" >
            Update Branch
        </span>
        
    </div>


</div>

    <form id="upexpense" name="upexpense"  method="post" action="updatebranch" >

        <div id="MiddleBar" class="row" style="word-wrap: break-word;margin-top:2em;border-radius: 4px">
      <div class="row"> 
                  
          <div id="acceptTags" class="col-md-6 text-center" style="margin-bottom:4%;margin-top:2%;">   
              <label   id="focusedInput" >Branch Type:- <?php if($type==1)echo "Main";else echo "Secondary"; ?> </label>   
          </div> 
          
          <div id="contactno" class="col-md-6 text-center" style="margin-bottom:4%;margin-top:2%;">    
              <label id="contactnolb"   style="width:100%;margin:auto;"> Contact No :-   </label> 
             <input minlength="10" id="contactno" name="newno" type="text" placeholder="Branch Contact No"  value="<?php echo $exp_id?>" class="form-control text-center input-md" required=""> 
              
               <input id="older" name="oldno"  type="hidden" value="<?php echo $exp_id?>">
          </div>
      </div>      
      <div class="row " style="margin-bottom:4%;width:100%">    
          <div id="Tabs" class=" text-center" style="margin-bottom:4%;font-size:0.8em;font-weight:bold">    
              
              <div class="col-md-12 text-center">
      <button id="locationbutt" name="locationbutt" class="btn btn-primary" disabled>Location:-<?php echo $loc?></button>
       <label id="errordiv" style="color:red;font-size:0.9em;margin-left: 0.5em"></label>
    <input id="country" type="hidden" name="country" value="<?php echo $country?>"  />
    <input id="state" type="hidden" name="state" value="<?php echo $state?>" />
    <input id="city" type="hidden" name="city" value="<?php echo $city?>" />
  </div>
              <div id="mapcontainer" class="form-group row" style="margin-left:1.5em">
    
     <div class="col-md-12">
         <div id="googleMap" class="style3"></div>
    </div>
</div>
          </div>      
          
      </div>
           
  </div>





<div id="BottomBar" class="row text-center" >


     <div  class="text-center myborder" style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);" >
    <span class="glyphicon glyphicon-header text-center"></span>
</div>
   
    
<button  type="submit" id="submitter" class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="validateoffer(event)" >
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
