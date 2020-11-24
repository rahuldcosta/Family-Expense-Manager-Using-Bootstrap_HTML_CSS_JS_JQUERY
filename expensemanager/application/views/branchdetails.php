<html lang="en" onclick="SlideMyMenu(2,event)"><head>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendorofferdetails/myproj.css">
     <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Home.js"></script>
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
<?php $news=$type?>
  <body>
  	

<div id="Maincontainer" class="container "> 
    
    
    
    
    
<?php $this->load->view('vendorslidermenu',$mega);?>
    
    
    
    
<div id="TopBar" class="row text-center">
    <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)"></span>
    <span>Branch Details</span>
</div>



 <!--Remaining View Starts here -->
 
 
  <div id="MiddleBar" class="row" style="word-wrap: break-word;margin-top:4em">
      <div class="row"> 
                  
          <div id="acceptTags" class="col-md-6 text-center" style="margin-bottom:4%;margin-top:2%;">   
              <label   id="focusedInput" >Branch Type:- <?php if($type==1)echo "Main";else echo "Secondary"; ?> </label>   
          </div> 
          
          <div id="contactno" class="col-md-6 text-center" style="margin-bottom:4%;margin-top:2%;">    
              <label id="contactnolb"   style="width:100%;margin:auto;"> Contact No :-   <?php echo $exp_id?> </label> 
          </div>
      </div>      
      <div class="row " style="margin-bottom:4%;width:100%">    
          <div id="Tabs" class=" text-center" style="margin-bottom:4%;font-size:0.8em;font-weight:bold">    
              <label    style="width:60%;margin:auto;font-size: 1.2em"> Location  </label> 
              <label   style="width:60%;margin:auto;font-size: 1.2em">  <?php echo $loc?>  </label> 
          </div>      
          
      </div>
      
  </div>
 
 
 
<div id="BottomBar" class="row text-center ">
    <?php if($news==2){?>
    <div class="myborder " style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC; opacity: 1"
         onclick="location.href='<?php echo site_url("managebranchcontroller/deletebranch?e_id=$exp_id"); ?>',checker=0">
        <span class="glyphicon glyphicon-trash" style="border-radius: 25px;"></span>  <!--<?php echo $end_status?>  -->
    </div>
    <?php }else {?>
     <div class="myborder " style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC; opacity: 1"
         onclick="location.href='<?php echo site_url("vendorhomecontroller"); ?>',checker=0">
        <span class="fa fa-history" style="border-radius: 25px;"></span>  <!--<?php echo $end_status?>  -->
    </div>
    
     <?php }?>
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;">
        <span class="glyphicon glyphicon-home" style="color:red;border-radius: 25px;" onclick="location.href='<?php echo site_url('managebranchcontroller'); ?>',checker=0"></span>
    </div>
    
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;opacity: 1" onclick="location.href='<?php echo site_url("managebranchcontroller/displayupdateview?e_id=$exp_id"); ?>',checker=0">
        <span class="glyphicon glyphicon-pencil" style="border-radius: 25px;"></span>
    </div>
</div>


</div>

</body>
</html>
