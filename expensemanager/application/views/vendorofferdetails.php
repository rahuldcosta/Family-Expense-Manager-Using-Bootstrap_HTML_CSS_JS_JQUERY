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

  <body>
  	

<div id="Maincontainer" class="container "> 
    
    
    
    
    
<?php $this->load->view('vendorslidermenu',$mega);?>
    
    
    
    
<div id="TopBar" class="row text-center">
    <span id="SliderM" style="cursor: pointer;" class="text-center glyphicon glyphicon-list " onclick="SlideMyMenu(1,event)"></span>
    <span>Offer Details</span>
</div>



 <!--Remaining View Starts here -->
 
 
  <div id="MiddleBar" class="row" style="word-wrap: break-word;">
      <div class="row"> 
                  
          <div id="acceptTags" class="col-md-4 text-center" style="margin-bottom:4%;margin-top:2%;">   
              <label   id="focusedInput" >Tag:- <?php echo $tag?> </label>   
          </div> 
          <div id="location" class="col-md-4 text-center" style="margin-bottom:4%;margin-top:2%;">    
              <label id="locationlb"   style="width:100%;margin:auto;"> Branch :-   <?php echo $loc?> </label> 
          </div>
          <div id="contactno" class="col-md-4 text-center" style="margin-bottom:4%;margin-top:2%;">    
              <label id="contactnolb"   style="width:100%;margin:auto;"> Contact No :-   <?php echo $cno?> </label> 
          </div>
      </div>      
      <div class="row " style="margin-bottom:4%;width:100%">    
          <div id="Tabs" class=" text-center" style="margin-bottom:4%;font-size:0.8em;font-weight:bold">    
              <label id="customdate"   style="width:60%;margin:auto;"> Added on :-   <?php echo $start_date?> </label> 
          </div>      
          <div style="width:90%">
              <textarea class="form-control " disabled="" rows="5" style="font-weight: bold;font-size:0.8em;margin-left:2.5em">Description:-   <?php echo $description?></textarea>   
          </div>   
      </div>
      
  </div>
 
 
 
<div id="BottomBar" class="row text-center">
    <div class="myborder " style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC; opacity: 1"
         onclick="location.href='<?php echo site_url("vendorhomecontroller/deleteoffer?e_id=$exp_id"); ?>',checker=0">
        <span class="glyphicon glyphicon-trash" style="border-radius: 25px;"></span>  <!--<?php echo $end_status?>  -->
    </div>
    
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;">
        <span class="glyphicon glyphicon-home" style="color:red;border-radius: 25px;" onclick="location.href='<?php echo site_url('vendorhomecontroller'); ?>',checker=0"></span>
    </div>
    
    <div class="text-center myborder" style="cursor:pointer;height:1.4em;width:33.33%;float:left;z-index: 8;background: #FFFFCC;opacity: 1" onclick="location.href='<?php echo site_url("vendorhomecontroller/displayupdateview?e_id=$exp_id"); ?>',checker=0">
        <span class="glyphicon glyphicon-pencil" style="border-radius: 25px;"></span>
    </div>
</div>


</div>

</body>
</html>
