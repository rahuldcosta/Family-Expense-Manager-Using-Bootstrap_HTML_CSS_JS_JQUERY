<html lang="en" onclick="SlideMyMenu(2,event)"><head>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/customerhome/myproj.css">
     
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        function switchtoeditmode()
        {
            document.getElementById('focusedInput').removeAttribute('disabled');
            
            //$("input#price").disabled="FALSE";
        }
    </script>
  </head>

  <body>
  	

<div id="Maincontainer" class="container "> 
    
    
    
    
    
<?php $this->load->view('slidermenu',$mega);?>
    
    
    
    
<div id="TopBar" class="row text-center">
    <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)"></span>
    <span>Expense Details</span>
</div>



 <!--Remaining View Starts here -->
 
 
  <div id="MiddleBar" class="row"><div class="row"> 
          <div id="amountEntry" class="col-md-6 " style="margin-top:2%;height:2em;margin-bottom:4%">   
              <div class="text-center" style="float:left;width:50%;margin-left:20%;margin-right:10%">     
                  <input disabled="FALSE"  class="form-control text-center" style="width:100%" id="focusedInput" type="text" value="<?php echo $price?>" >     
              </div> 
              
              <div style="float:left;width: 1.5em; text-align: center; font-size:1.5em;height:1.5em;">  
                  <i class="fa fa-inr"></i>        
              </div>         
          </div>         
          <div id="acceptTags" class="col-md-6 " style="margin-bottom:4%;margin-top:2%;">   
              <input disabled="" class="form-control" id="focusedInput" type="text" value="<?php echo $tag?>">    
          </div>    
      </div>      
      <div class="row " style="margin-bottom:4%;width:90%;margin-left:3%">    
          <div id="Tabs" style="margin-bottom:4%;font-size:0.8em;font-weight:bold">    
              <input disabled="" id="customdate" class="form-control text-center" type="text" style="width:60%;margin:auto;" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $start_date?>">     
          </div>      
          <div style="width:90%">
              <textarea class="form-control" disabled="" rows="5" style="font-size:0.7em"><?php echo $description?></textarea>   
          </div>   
      </div>
      <div class="row text-center">  
          <div class="col-md-6" style="margin-bottom:4%">   
              <input disabled="" class="form-control" id="focusedInput" type="text" value="<?php echo $repeatstatus?>">    
          </div>    
          <div class="col-md-6" style="margin-bottom:0.4em;">     
              <input disabled="" class="form-control" id="focusedInput" type="text" value="<?php echo $end_status?>">  
          </div>    
      </div>     
      <div id="Thedate" class=" text-center" style="margin-bottom:4%;">  
          <input disabled="" class="form-control text-center" type="text" style="width:60%;margin:auto;" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $end_date?>">   
      </div>
  </div>
 
 
 
<div id="BottomBar" class="row text-center">
    <div class="myborder " style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;border-color: #FFFFCC;border-color:blue; opacity: 1"
         onclick="location.href='<?php echo site_url("addexpensecontroller/deleteexpense?e_id=$exp_id"); ?>',checker=0">
        <span class="glyphicon glyphicon-trash" style="border-radius: 25px;"></span>  <!--<?php echo $end_status?>  -->
    </div>
    
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;border-color:blue;border-radius: 7px;">
        <span class="glyphicon glyphicon-home" style="color:red;border-radius: 25px;" onclick="location.href='<?php echo site_url('customerhomecontroller/index'); ?>',checker=0"></span>
    </div>
    
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;border-color:#FFFFCC; border-color:blue;opacity: 1" onclick="switchtoeditmode()">
        <span class="glyphicon glyphicon-pencil" style="border-radius: 25px;"></span>
    </div>
</div>


</div>

</body>
</html>
