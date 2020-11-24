<!DOCTYPE html>
<html lang="en" onclick="SlideMyMenu(2,event)">
  <head>
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Expense.js"></script>
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/addexpense/Expense.css">
      
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
    function validateexpense(event)
    {
      //  document.forms['addexpense'].submit();
      //  action="addexpensecontroller/insertexpense"
      
      var x = new Date(document.getElementById('customdate').value);
       var y = new Date(document.getElementById('enderdate').value);
       if(x>y)
       {
           event.preventDefault();
           document.getElementById('errormsg').innerHTML="Start Date cannot be in the Future";
         return;  
       }
        if(document.getElementById('price').value!="" &&document.getElementById('focusedInput').value!="")
        {
           
        document.getElementById("addexpense").action="addexpensecontroller/insertexpense";
         document.forms['addexpense'].submit();
    }
    }
    </script>
  </head>

  <body  onload="Activechanger('body','t')">
  	

<div id="Maincontainer" class="container "  > 
    
    
    
    
    
<?php $this->load->view('slidermenu',$mega);?>
    
    
    
    
<div id="TopBar" class="row text-center" >
 <div id="TopBar" class="row text-center">
        <span style="cursor: pointer;" id="SliderM" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)">
        </span>
        <span id="Add_Expense" style="font-size:1.2em" >
            Add Expense
        </span>
        
    </div>


</div>

    <form id="addexpense" name="addexpense"  method="post" action="" >
<div id="MiddleBar" class="row"  style="margin-top:1.9em;border-radius:20px" >

  <div   class="row"  >
        
        
                    <div id="amountEntry"  class="col-md-6 " style="margin-top:2%;height:2em;margin-bottom:4%">
        
            
         
                        <div class="text-center"style="float:left;width:50%;margin-left:20%;margin-right:10%">
                                <input  class="form-control text-center" id="price" name="price" style="width:100%"  id="focusedInput" type="number" step="0.01" min="0.01" placeholder="0.00" required> 
                        </div>
         
         
                    <div style="float:left;width: 1.5em; text-align: center; font-size:1.5em;height:1.5em;">  
                        <i class="fa fa-inr" ></i>
                            </div>
                        
 
        
                    </div>
       
        
        
         <div id="acceptTags" required class="col-md-6 " style="margin-bottom:4%;margin-top:2%;">
             <input class="form-control"  name="tag" id="focusedInput" type="text" placeholder="Tap to Add Tags" required>
        
        </div>
         </div>
    
    
    
   
    
    
    
        
   
       <div   class="row " style="margin-bottom:4%;width:90%;margin-left:3%">
        
    <div id="Tabs" style="margin-bottom:4%;font-size:0.8em;font-weight:bold">
        <ul id="dx"class="nav nav-tabs text-center" style="font-size:0.7em;" >
    <li   class="day"style="margin-left:1.2em;" onclick="Activechanger(this,'y')"><a href="#">Yesterday</a></li>
    <li  id="today" class="active day" onclick="Activechanger(this,'t')"><a href="#">Today</a></li>
    <li class="day" onclick="Activechanger(this,'c')"><a href="#" >Custom</a><span>
    </li>
    
        </ul>
        <input id="customdate" name="c_date" class="form-control text-center" type="text" style="width:60%;margin:auto;visibility:hidden" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tap To Set Date" ></span>
        <input id ="setdate" name="c_date" type="hidden" value="">
        
        </div>
        
        <div style="width:90%">
            <textarea class="form-control" name="description" rows="6" id="comment" placeholder="Description.." style="width:110%;margin-left:1em"></textarea>
     
        </div>
        
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div  class="row text-center" >
    <div  class="col-md-6" style="margin-bottom:1.5em">
         
             <select  id="Repeatddl" name="Repeatstatus" class="btn btn-default dropdown-toggle" onchange="DisplayEndDateList()">
  <option value="0">Repeat:  Never</option>
  <option value="1">Repeat:  Daily</option>
  <option value="2">Repeat:  Weekends</option>
  <option value="3">Repeat:  Weekdays</option>
</select>
         
         
         
         </div>
        
        <div  class="col-md-6" style="margin-bottom:0.4em;">
              <select id="Enddl" name="Endstatus" class="btn btn-default dropdown-toggle" onchange="showdateinput()" style="visibility:hidden">
  <option value="0">End:  Today</option>
  <option value="1">End:   On Date</option>

</select>
        
    </div>
        
    
         
         
    
      
     
  
</div>
    
    
    
    
    <div  id="Thedate" class=" text-center" style="margin-bottom:4%;visibility:hidden">
    <input id="enderdate" class="form-control text-center" name="enddate" type="text" style="width:60%;margin:auto;" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tap To Set Date" >
       
     </div>
    
    
    <div id="errormsg" class="text-center" style=" color:red"></div>
  
</div>







<div id="BottomBar" class="row text-center" >

    
     <div  class="text-center myborder" style="width: 33.33%; float: left; z-index: 8; opacity: 0; background: rgb(255, 255, 204);" >
    <span class="glyphicon glyphicon-header text-center"></span>
</div>
   
    
<button  type="submit" id="submitter" class="text-center myborder" style="cursor:pointer;width:33.33%;float:left;z-index: 8;background: #FFFFCC;" onclick="validateexpense(event)" >
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
